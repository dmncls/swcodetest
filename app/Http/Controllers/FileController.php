<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\File;

class FileController extends Controller
{
    /**
     * Display a testing form
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addfile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check content type
        if (!$request->isJson()) {
            abort(404, 'Request must be JSON');
        }
        
        // get parameters
        $type = $request->input('type');
        $name = $request->input('name');
        $body = $request->input('body');
        
        // check parameters
        if (empty($type) || empty($name) || empty($body)) {
            abort(400, 'Parameter/s missing');
        }
        
        // get the base64 version of the data
        $bodyBase64 = $this->convertToBase64($body);
        
        // create hashes
        $hashBody = md5($body);
        $hashBodyBase64 = md5($bodyBase64);
        
        // save in database
        $file = new File();
        $file->type = $type;
        $file->name = $name;
        $file->body_base64 = $bodyBase64;
        $file->hash_body = $hashBody;
        $file->hash_body_base64 = $hashBodyBase64;
        $file->save();
        
        return response()->json( compact( 
                'bodyBase64', 'hashBody', 'hashBodyBase64'
            )
        );
    }
    
    /**
     * Runs command line base64 on data
     * 
     * @param string $data Binary string of data
     */
    protected function convertToBase64($data) {
        
        // prep for base64
        $errorFile = tempnam(sys_get_temp_dir(), 'codetest');
        $descriptors = array(
            array('pipe', 'rb'),
            array('pipe', 'w'),
            array('file', $errorFile, 'w')
        );
        
        // run base64
        $pipes = array();
        $proc = proc_open('base64', $descriptors, $pipes);
        if (!$proc) {
            abort(500, 'Cannot run base64 command');
        }
        
        // write data to stdin pipe
        fwrite($pipes[0], $data);
        fclose($pipes[0]);
        
        // capture base64 output from stdout pipe
        $dataBase64 = trim(stream_get_contents($pipes[1]));
        fclose($pipes[1]);

        // finish process
        $resultCode = proc_close($proc);
        
        // @todo Check result code and throw error (with contents of stderr?)
        
        return $dataBase64;
    }
}
