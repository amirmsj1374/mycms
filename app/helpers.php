<?php

function translate_section_types($word)
    {
        switch ($word) {
            case 'features' : return' خدمات '; break;
            case 'tabs' : return' مجموعه تب '; break;
            case 'prices' : return' قیمت ها '; break;
            case 'cards' : return' کارت ها'; break;
            case 'faq' : return' پرسش و پاسخ '; break;
            case 'clients' : return' مشتریان ما '; break;
            case 'posts' : return' پست ها '; break;
    
            default :  return $word; break;
        }
    }