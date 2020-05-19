<?php
function getCategoriesNameFromId($id){
    $CI = &get_instance();
    $CI->load->model('categories_model');
    $condition = array(
        '_id' => $CI->mongo_db->create_document_id($id)
    );
    $result = $CI->categories_model->findOne($condition);
    return $result['categories_name'];
}
function getProductNameFromId($id){
    $CI = &get_instance();
    $CI->load->model('product_model');
    $condition = array(
        '_id' => $CI->mongo_db->create_document_id($id)
    );
    $result = $CI->product_model->findOne($condition);
    return $result['product_name'];
}
function getProductPriceFromId($id){
    $CI = &get_instance();
    $CI->load->model('product_model');
    $condition = array(
        '_id' => $CI->mongo_db->create_document_id($id)
    );
    $result = $CI->product_model->findOne($condition);
    return $result['priceEach'];
}

function getProductImg($id){
    $CI = &get_instance();
    $CI->load->model('product_model');
    $condition = array(
        '_id' => $CI->mongo_db->create_document_id($id)
    );
    $result = $CI->product_model->findOne($condition);
    return $result['imgPart'];
}

function getProductCount(){
    $CI = &get_instance();
    $CI->load->model('orderdetails_model');
    $result = $CI->orderdetails_model->productCount();
    return $result;
}





