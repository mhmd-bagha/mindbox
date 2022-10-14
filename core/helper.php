<?php

use Response\Response as response;

// currentDomain url domain
function currentDomain()
{
    $httpProtocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") ? "https://" : "http://";
    $currentUrl = $_SERVER['HTTP_HOST'];
    return $httpProtocol . $currentUrl;
}

// currentUrl url now
function currentUrl()
{
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

// paginate items page
function paginate($data, $perPage)
{
    $totalRows = count($data);
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $totalPages = ceil($totalRows / $perPage);
    $currentPage = min($currentPage, $totalPages);
    $currentPage = max($currentPage, 1);
    $currentRow = ($currentPage - 1) * $perPage;
    $data = array_slice($data, $currentRow, $perPage);
    return $data;
}

// paginateView number page
function paginateView($data, $perPage)
{
    $total_rows = count($data);
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $total_pages = ceil($total_rows / $perPage);
    $current_page = min($current_page, $total_pages);
    $current_page = max($current_page, 1);
    $paginateView = '';
//    start page
    $paginateView .= ($current_page != 1) ? '<a href="' . paginateUrl(1) . '" class="page">&lt;</a>' : '';
//    pre page
    $paginateView .= (($current_page - 3) >= 1) ? '<a href="' . paginateUrl($current_page - 3) . '" class="page">' . $current_page - 3 . '</a>' : '';
    $paginateView .= (($current_page - 2) >= 1) ? '<a href="' . paginateUrl($current_page - 2) . '" class="page">' . $current_page - 2 . '</a>' : '';
    $paginateView .= (($current_page - 1) >= 1) ? '<a href="' . paginateUrl($current_page - 1) . '" class="page">' . $current_page - 1 . '</a>' : '';
//    page current(now)
    $paginateView .= '<a href="' . paginateUrl($current_page) . '" class="page pagination-active">' . $current_page . '</a>';
//    next page
    $paginateView .= (($current_page + 1) <= $total_pages) ? '<a href="' . paginateUrl($current_page + 1) . '" class="page">' . $current_page + 1 . '</a>' : '';
    $paginateView .= (($current_page + 2) <= $total_pages) ? '<a href="' . paginateUrl($current_page + 2) . '" class="page">' . $current_page + 2 . '</a>' : '';
    $paginateView .= (($current_page + 3) <= $total_pages) ? '<a href="' . paginateUrl($current_page + 3) . '" class="page">' . $current_page + 3 . '</a>' : '';
//    end page
    $paginateView .= ($current_page != $total_pages) ? '<a href="' . paginateUrl($total_pages) . '" class="page">&gt;</a>' : '';
    return '<div class="pagination-layer text-center pt-3">' . $paginateView . '</div>';
}

// paginateUrl url page
function paginateUrl($page)
{
    $urlArray = explode('?', currentUrl());
    unset($_GET['url']);
    if (isset($urlArray[1])) {
        $_GET['page'] = $page;
        $getVariables = array_map(function ($value, $key) {
            return $key . '=' . $value;
        }, $_GET, array_keys($_GET));
        return $urlArray[0] . '?' . implode('&', $getVariables);
    } else {
        return currentUrl() . '?page=' . $page;
    }
}

function validate_image(array $file, $type = true, $size = true, $w = '', $h = '')
{
    $message = '';
    $tmp_file = $file['tmp_name'];
    $size_file = $file['size'];
    $type_file = $file['type'];
    // format(type)
    if ($type):
        if (!in_array($type_file, TYPE_IMG)) $message = errors['format_img'];
    endif;
    // size(compress)
    if ($size):
        if ($size_file <= SIZE_IMG) $message = errors['capacity_size_of_img'];
    endif;
    // width or height
    if (!empty($w) || !empty($h)):
        list($width, $height) = getimagesize($tmp_file);
        if (!empty($w)):
            if ($w != $width) $message = 'عرض تصویر نامعتبر است';
        endif;
        if (!empty($h)):
            if ($h != $height) $message = 'طول تصویر نامعتبر است';
        endif;
    endif;
    // return result
    if (!empty($message))
        return response::unJson(500, false, ['domain' => DOMAIN, 'message' => $message]); // return result object
    else
        return true;
}