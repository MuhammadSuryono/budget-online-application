<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public $BASE_URL;
    public $js = array();
    public $css = array();
    function __construct()
    {
        parent::__construct();
        $this->set_base_url('development');
    }

    public $parseData = [
        'navbar' => 'parts/navbar',
        'sidebar' => 'parts/sidebar',
        'modal' => 'parts/modal',
        'content' => 'errors/error',
        'footer' => 'parts/footer',
        'javascript' => array(),
        'css' => array(),
        'isLogin' => true,
        'logo'=>'assets/img/logomri.png',
        'title_budge' => 'Not Found!',
        'title_tab' => "Budget Online",
    ];

    public $config = [
        "first_link" => "First",
        "last_link" => "Last",
        "next_link" => "Next",
        "prev_link" => "Prev",
        "full_tag_open" => '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">',
        "full_tag_close" => "</ul></nav></div>",
        "num_tag_open" => '<li class="page-item"><span class="page-link">',
        "num_tag_close" => '</span></li>',
        "cur_tag_open" => '<li class="page-item active"><span class="page-link">',
        "cur_tag_close" => '<span class="sr-only">(current)</span></span></li>',
        "next_tag_open" => '<li class="page-item"><span class="page-link">',
        "next_tagl_close" => '<span aria-hidden="true">&raquo;</span></span></li>',
        "prev_tag_open" => '<li class="page-item"><span class="page-link">',
        "prev_tagl_close" => '</span>Next</li>',
        "first_tag_open" => '<li class="page-item"><span class="page-link">',
        "first_tagl_close" => '</span></li>',
        "last_tag_open" => '<li class="page-item"><span class="page-link">',
        "last_tagl_close" => '</span></li>',
    ];

    /***
     * @param array $body
     * @param $url
     * @param array $header
     * @return mixed
     */
    public function http_request_post($url, $body = [], $header = [])
    {
        $headr = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        if (isset($this->session->userdata("userData")->token)) {
            $headr[] = 'Authorization: Bearer ' . $this->session->userdata("userData")->token;
        }

        if (!empty($header)) $headr = array_merge($headr, $header);

        $crl = curl_init();

        curl_setopt_array($crl, array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 60,    // time-out on connect
            CURLOPT_TIMEOUT        => 60,    // time-out on response
            CURLOPT_URL => $this->BASE_URL . $url,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => $headr,
        ));


        $result = curl_exec($crl);
        $error = curl_error($crl);

        if (isset(json_decode($result)->response->code) && json_decode($result)->response->code == 401) {
            $this->session->unset_userdata("userIsLogin");
            $this->session->unset_userdata("userData");
            redirect(base_url());
        }

        curl_close($crl);

        log_message("info", "post ".$result);

        return json_decode($result);
    }

    /**
     * @param $url
     * @param $body
     * @return mixed
     */
    public function http_request_post_file($url, $body = [])
    {
        $headers = [
            'Content-Type: multipart/form-data',
            'Accept: application/json'
        ];

        if (isset($this->session->userdata("userData")->token)) {
            $headers[] = 'Authorization: Bearer ' . $this->session->userdata("userData")->token;
        }

        if (!empty($header)) $headers = array_merge($headers, $header);

        $filedata = $_FILES['file']['tmp_name'];
        $filesize = $_FILES['file']['size'];

        $postfields = array("file" => "@$filedata");
        if (!empty($body)) $postfields = array_merge($postfields, $body);


        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $this->BASE_URL . $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_INFILESIZE => $filesize,
            CURLOPT_RETURNTRANSFER => true
        ); // cURL options


        $close = curl_setopt_array($ch, $options);
        $result = curl_exec($ch);

        if (isset(json_decode($result)->response->code) && json_decode($result)->response->code == 401) {
            $this->session->unset_userdata("userIsLogin");
            $this->session->unset_userdata("userData");
            redirect(base_url());
        }

        curl_close($ch);

        return json_decode($result);
    }

    /***
     * @param array $body
     * @param $url
     * @param array $header
     * @return mixed
     */
    public function http_request_get($url, $body = [], $header = [], $is_json = false)
    {
        $headr = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        if (isset($this->session->userdata("userData")->token)) {
            $headr[] = 'Authorization: Bearer ' . $this->session->userdata("userData")->token;
        }

        if (!empty($header)) $headr = array_merge($headr, $header);

        $crl = curl_init();

        curl_setopt_array($crl, array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 60,    // time-out on connect
            CURLOPT_TIMEOUT        => 60,    // time-out on response
            CURLOPT_URL => $this->BASE_URL . $url,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => $headr,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));


        $result = curl_exec($crl);
        $error = curl_error($crl);

        if (isset(json_decode($result)->response->code) && json_decode($result)->response->code == 401) {
            $this->session->unset_userdata("userIsLogin");
            $this->session->unset_userdata("userData");
            redirect(base_url());
        }

        curl_close($crl);

        log_message("info", "get ".$result);

        return json_decode($result, $is_json);
    }

    public function http_request_put($url, $body = [], $header = [])
    {
        $headr = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        if (isset($this->session->userdata("userData")->token)) {
            $headr[] = 'Authorization: Bearer ' . $this->session->userdata("userData")->token;
        }

        if (!empty($header)) $headr = array_merge($headr, $header);

        $crl = curl_init();

        curl_setopt_array($crl, array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 60,    // time-out on connect
            CURLOPT_TIMEOUT        => 60,    // time-out on response
            CURLOPT_URL => $this->BASE_URL . $url,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => $headr,
            CURLOPT_CUSTOMREQUEST => 'PUT',
        ));


        $result = curl_exec($crl);
        $error = curl_error($crl);

        if (isset(json_decode($result)->response->code) && json_decode($result)->response->code == 401) {
            $this->session->unset_userdata("userIsLogin");
            $this->session->unset_userdata("userData");
            redirect(base_url());
        }

        curl_close($crl);

        log_message("info", "put ".$result);
        return json_decode($result);
    }

    public function http_request_delete($url, $body = [], $header = [])
    {
        $headr = [
            'Content-Type: application/json',
            'Accept: application/json'
        ];

        if (isset($this->session->userdata("userData")->access_token)) {
            $headr[] = 'Authorization: Bearer ' . $this->session->userdata("userData")->access_token;
        }

        if (!empty($header)) $headr = array_merge($headr, $header);

        $crl = curl_init();

        curl_setopt_array($crl, array(
            CURLOPT_RETURNTRANSFER => true,   // return web page
            CURLOPT_HEADER         => false,  // don't return headers
            CURLOPT_FOLLOWLOCATION => true,   // follow redirects
            CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
            CURLOPT_ENCODING       => "",     // handle compressed
            CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
            CURLOPT_CONNECTTIMEOUT => 60,    // time-out on connect
            CURLOPT_TIMEOUT        => 60,    // time-out on response
            CURLOPT_URL => $this->BASE_URL . $url,
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => $headr,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
        ));


        $result = curl_exec($crl);
        $error = curl_error($crl);

        if (isset(json_decode($result)->response->code) && json_decode($result)->response->code == 401) {
            $this->session->unset_userdata("userIsLogin");
            $this->session->unset_userdata("userData");
            redirect(base_url());
        }

        curl_close($crl);

        log_message("info", "delete ".$result);

        return json_decode($result);
    }

    /**
     * @param string $environment
     * @return string
     */
    private function base_url(string $environment): string
    {
        switch ($environment) {
            case 'development':
                return 'http://192.168.8.2/budget-online-service/';
            case 'local':
                return 'http://localhost:7003/';
            case 'production':
                return 'http://mkp-operation.com:7793/budget-online-serv/';
            default:
                return '';
        }
    }

    /**
     * @param string $environment
     * @return void
     */
    private function set_base_url(string $environment)
    {
        $this->BASE_URL = $this->base_url($environment);
    }

    /**
     * @return bool
     */
    public function isLogin(): bool
    {
        $isLogin = true;
        if ($this->session->userdata('userIsLogin')) $isLogin = true;

        return $isLogin;
    }

    /**
     * @return string
     */
    public function lasth_path_url(): string
    {
        $url = $this->uri->segment(1);
        if ($url == 'login') $url = 'dashboard';
        return $url;
    }

    /**
     * @param $data
     * @return void
     */
    public function print_pretty($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    /**
     * @return mixed
     */
    public function register_number()
    {
        return $this->session->userdata('sessionUser')->number_of_register;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get_session($key)
    {
        return $this->session->userdata($key);
    }

    /**
     * @param $key
     * @param $value
     * @return void
     */
    public function set_session($key, $value)
    {
        $this->session->set_userdata($key, $value);
    }

    /**
     * @param $assigned_time
     * @param $completed_time
     * @return string
     * @throws Exception
     */
    public function count_duration($assigned_time, $completed_time): string
    {
        $d1 = new DateTime($assigned_time);
        $d2 = new DateTime($completed_time);
        $interval = $d2->diff($d1);

        return $interval->format('%H : %I : %S');
    }
}
