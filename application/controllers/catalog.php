<?php

class Catalog extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('db_model');
  }

  public function view($page = 'index') {
    if ( ! file_exists('application/views/catalog/'.$page.'.php')) {
      // Whoops, we don't have a page for that!
      show_404();
    }

    $this->load->helper('url');
    $data['categories'] = $this->db_model->get_category();

    if( $page != 'index' ) {
      $data['title'] = ucwords(str_replace( "-", " ", $page) ); // Capitalize the first letter
    } else {
      $data['title'] = '';
    }

    $data['loggedin'] = false;

    $data['catalog'] = $this->db_model->get_catalog();

    $this->load->view('templates/header', $data);
    $this->load->view('catalog/'.$page, $data);
    $this->load->view('templates/footer', $data);
  }
  
  public function category( $category = false ) {
    if( $category === false ) {
        show_404();
    }

    $this->load->helper('url');
    $data['categories'] = $this->db_model->get_category();

    if ( ( $data['content'] = $this->db_model->get_category($category) ) == FALSE ) {
        show_404();
    }
    $data['title'] = ucwords(str_replace( "-", " ", $data['content']['name']) ); // Capitalize the first letter
    $data['loggedin'] = false;

    $this->load->view('templates/header', $data);
    $this->load->view('category/showitems', $data);
    $this->load->view('templates/footer', $data);
  }
  
  public function page( $page = false ) {

    if( $page === false ) {
        show_404();
    }

    $this->load->helper('url');
    $data['categories'] = $this->db_model->get_category();

    if ( ( $data['content'] = $this->db_model->get_page($page) ) == FALSE ) {
        show_404();
    }
    
    $data['title'] = ucwords(str_replace( "-", " ", $data['content']['title']) ); // Capitalize the first letter
    $data['loggedin'] = false;
    $data['description'] = $data['content']['description'];

    $this->load->view('templates/header', $data);
    $this->load->view('page/page-template', $data);
    $this->load->view('templates/footer', $data);
  }
}
?>
