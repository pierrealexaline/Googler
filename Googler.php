<?php

    class Googler{

        public $search;
        public $config;
        public $cmd;
        public $results;

        /**
         * Construct.
         * 
         * @param array $config  config var required by Googler
         * 
         */

        public function __construct(array $config)
        {
            putenv("PYTHONIOENCODING=utf-8");  
            $this->cmd = 'timeout=' . $config['timeout'];
            $this->cmd .= ' googler ';
            if($config['start'] > 0)                $this->cmd .= ' -s ' . $config['start'];
            if($config['length'] > 0)               $this->cmd .= ' -n ' . $config['length'];
            if($config['site'] != '')               $this->cmd .= ' -w ' . $config['site'];
            if($config['time'] != '')               $this->cmd .= ' --time ' . $config['time'];
            if($config['news'] > 0)                 $this->cmd .= ' -N ';
            if($config['country'] != '')            $this->cmd .= ' -c ' . $config['country'];
            if($config['lang'] != '')               $this->cmd .= ' -l ' . $config['lang'];
            if($config['exact'] > 0)                $this->cmd .= ' -x ';
            if($config['unfilter'] > 0)             $this->cmd .= ' --unfilter ';
            if($config['proxy'] != '')              $this->cmd .= ' -p ' . $config['proxy'];
            if($config['notweak'] > 0)              $this->cmd .= ' --notweak '; 
            if($config['json'] > 0)                 $this->cmd .= ' --json ';
            if($config['urlhandler'] != '')         $this->cmd .= ' --url-handler ' . $config['urlhandler'];
            if($config['showbrowserlogs'] != '')    $this->cmd .= ' --show-browser-logs '; 
            $this->results = array();
        } 

        /**
         * Search with Googler | Googler interface function.
         * 
         * @param string $search search query. 
         * @return string $this->results html or json Serp.
         * 
         */

        public function search(string $search){
            $this->search = trim(urlencode($search));
            $this->cmd = $this->cmd . $this->search . ' &';
            exec($this->cmd,$this->results);
            $this->results = implode('',$this->results);
            return $this->results;
        } 
        
    }