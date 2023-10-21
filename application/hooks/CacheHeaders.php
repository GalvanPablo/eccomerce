<?php
class CacheHeaders {
    public function set_cache_headers() {
        // Configura los encabezados HTTP para controlar la caché
        header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
        header('Cache-Control: post-check=0, pre-check=0');
        header('Pragma: no-cache');
    }
}