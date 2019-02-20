<?php
/**
 *Date:2019/2/19
 *Time:15:55
 */

function alertMsg($mes,$url)
{
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}