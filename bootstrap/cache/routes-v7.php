<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1FvCyo3ZX1l2wvOn',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UzPs9lDJTWYPUEcO',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xMiDoPVCqFyRiktE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/refresh' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tgLVyKI9GkkjlysN',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/me' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A2yFN57WiIXbzeKE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/report/student-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VIdlzo78oEr70dvK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/report/export-student-payment-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZxyXoFP7C1devIWL',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mdp/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v580NkpoAvAGujex',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mdp/store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::zljsQQkmT0u4Uyma',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mdp/update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::90z3tFL83rKeGcmM',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-employee-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NH7gHbJDMqej2Iwa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-supervisor-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ty0kfbJVZjKv1IwX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/export-mdp-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MlEzBxJV04jTSIbq',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mdp/get-top-ranked-training' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nID3BMESdIHbzfHu',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/mdp/get-all-mdp-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::T4HLx9k1U4JxPlbs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empcode-wise-training-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QYQ5WvfPM4rQALwN',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/empcode-wise-single-training-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::loqDmaLg4lMtqPAW',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/training-feedback-submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::CNnrkE3qcPQftbKA',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/additional-training-feedback-submit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::kzdVo7GxAJwlVpWd',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/action-plane/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::94UeLo4f2w8oRUDQ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/hr_action_plane_store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::htBJFGe1wdZdmXJk',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/action_plane_update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rIutZPA1iCw2H9tL',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-all-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5BYlvvpHR80KkjzD',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-all-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::juW95u9hQVLHzFfX',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/action-plan/get-employee-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tYGy8j35iYjgRlyr',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/action-plan/get-supervisor-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KrQ5jye422xF6bAS',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/export-action-plane-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hVdAoxEhld5lWkaE',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/job-description/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sLdqXSk5w7uT8Bss',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/job-description-store' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Nm2xGg797pBkW6wg',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/job-description-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YAm93I0gx57FhtXb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/job-description/get-employee-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UxNkAao6VdeCg1jP',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/job-description/get-supervisor-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VRB6caSJBPIksSy0',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/export-job-description-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rJtv9Feb5T1ELJQb',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-all-employee-training-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::uzfl8DGCzVfet004',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-agree-business-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x0XUIeCR9oSYhLkC',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/get-all-session' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1Kya0iD1oImBdr5s',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/api/(?|mdp/(?|edit/([^/]++)(*:35)|print/([^/]++)(*:56)|delete/([^/]++)(*:78))|search/mdp/list/([^/]++)(*:110)|get\\-level\\-wise\\-suggestive\\-list/([^/]++)(*:161)|action(?|\\-plane\\-edit/([^/]++)(*:200)|_plane_(?|print/([^/]++)(*:232)|search/([^/]++)(*:255)|delete/([^/]++)(*:278)))|job\\-description\\-(?|edit/([^/]++)(*:322)|print/([^/]++)(*:344)|search/([^/]++)(*:367)|delete/([^/]++)(*:390)))|/(.*)?(*:406))/?$}sDu',
    ),
    3 => 
    array (
      35 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::s63gWKLngrARAhnL',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      56 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fgaFtprxoLMFeBZR',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      78 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::l7bF3V4VSpawgrmY',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      110 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DVnVge806DMlGEhC',
          ),
          1 => 
          array (
            0 => 'query',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::F9xtQjpgXcinZrLK',
          ),
          1 => 
          array (
            0 => 'StaffID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      200 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JktdqaRSBEQ6QNrP',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      232 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jDdfy0uGDlHXypWj',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      255 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Kcm1AsaOIrlGPn70',
          ),
          1 => 
          array (
            0 => 'query',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      278 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m9nZDUWoBZg0sJky',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      322 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QdbPjat2oLTULd2r',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      344 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::z6Q7Vh8kJ4iyAhD9',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      367 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::G4wLz0jeh8sUOeor',
          ),
          1 => 
          array (
            0 => 'query',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      390 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U4ItkDF7MSN5MHCj',
          ),
          1 => 
          array (
            0 => 'ID',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      406 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TGxiEPScanTXRzNV',
            'app' => NULL,
          ),
          1 => 
          array (
            0 => 'app',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::1FvCyo3ZX1l2wvOn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'generated::1FvCyo3ZX1l2wvOn',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UzPs9lDJTWYPUEcO' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@login',
        'controller' => 'App\\Http\\Controllers\\AuthController@login',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UzPs9lDJTWYPUEcO',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::xMiDoPVCqFyRiktE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xMiDoPVCqFyRiktE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tgLVyKI9GkkjlysN' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/refresh',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@refresh',
        'controller' => 'App\\Http\\Controllers\\AuthController@refresh',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::tgLVyKI9GkkjlysN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::A2yFN57WiIXbzeKE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/me',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\AuthController@me',
        'controller' => 'App\\Http\\Controllers\\AuthController@me',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::A2yFN57WiIXbzeKE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VIdlzo78oEr70dvK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/report/student-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@studentPayment',
        'controller' => 'App\\Http\\Controllers\\ReportController@studentPayment',
        'namespace' => NULL,
        'prefix' => 'api/report',
        'where' => 
        array (
        ),
        'as' => 'generated::VIdlzo78oEr70dvK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZxyXoFP7C1devIWL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/report/export-student-payment-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ReportController@studentPaymentReport',
        'controller' => 'App\\Http\\Controllers\\ReportController@studentPaymentReport',
        'namespace' => NULL,
        'prefix' => 'api/report',
        'where' => 
        array (
        ),
        'as' => 'generated::ZxyXoFP7C1devIWL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::v580NkpoAvAGujex' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@index',
        'controller' => 'App\\Http\\Controllers\\MDPController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::v580NkpoAvAGujex',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::zljsQQkmT0u4Uyma' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp/store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@store',
        'controller' => 'App\\Http\\Controllers\\MDPController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zljsQQkmT0u4Uyma',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::s63gWKLngrARAhnL' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/edit/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@edit',
        'controller' => 'App\\Http\\Controllers\\MDPController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::s63gWKLngrARAhnL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::90z3tFL83rKeGcmM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp/update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@update',
        'controller' => 'App\\Http\\Controllers\\MDPController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::90z3tFL83rKeGcmM',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::fgaFtprxoLMFeBZR' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/print/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@print',
        'controller' => 'App\\Http\\Controllers\\MDPController@print',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fgaFtprxoLMFeBZR',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::DVnVge806DMlGEhC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/mdp/list/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@search',
        'controller' => 'App\\Http\\Controllers\\MDPController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DVnVge806DMlGEhC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::l7bF3V4VSpawgrmY' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/mdp/delete/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@delete',
        'controller' => 'App\\Http\\Controllers\\MDPController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::l7bF3V4VSpawgrmY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NH7gHbJDMqej2Iwa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/get-employee-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::NH7gHbJDMqej2Iwa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Ty0kfbJVZjKv1IwX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/get-supervisor-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\MDPController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Ty0kfbJVZjKv1IwX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::F9xtQjpgXcinZrLK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-level-wise-suggestive-list/{StaffID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getLevelWiseSuggestiveList',
        'controller' => 'App\\Http\\Controllers\\MDPController@getLevelWiseSuggestiveList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::F9xtQjpgXcinZrLK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::MlEzBxJV04jTSIbq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/export-mdp-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MlEzBxJV04jTSIbq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::nID3BMESdIHbzfHu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-top-ranked-training',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getTopRankedTraining',
        'controller' => 'App\\Http\\Controllers\\MDPController@getTopRankedTraining',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::nID3BMESdIHbzfHu',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::T4HLx9k1U4JxPlbs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-all-mdp-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getAllMDPDepartment',
        'controller' => 'App\\Http\\Controllers\\MDPController@getAllMDPDepartment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::T4HLx9k1U4JxPlbs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QYQ5WvfPM4rQALwN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empcode-wise-training-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseTrainingList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QYQ5WvfPM4rQALwN',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::loqDmaLg4lMtqPAW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/empcode-wise-single-training-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseSingleTrainingList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseSingleTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::loqDmaLg4lMtqPAW',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::CNnrkE3qcPQftbKA' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/training-feedback-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::CNnrkE3qcPQftbKA',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::kzdVo7GxAJwlVpWd' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/additional-training-feedback-submit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@additionalTrainingAddAndFeedback',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@additionalTrainingAddAndFeedback',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::kzdVo7GxAJwlVpWd',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::94UeLo4f2w8oRUDQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/action-plane/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@index',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::94UeLo4f2w8oRUDQ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::htBJFGe1wdZdmXJk' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/hr_action_plane_store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@store',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::htBJFGe1wdZdmXJk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::JktdqaRSBEQ6QNrP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/action-plane-edit/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@edit',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JktdqaRSBEQ6QNrP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rIutZPA1iCw2H9tL' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/action_plane_update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@update',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rIutZPA1iCw2H9tL',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jDdfy0uGDlHXypWj' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/action_plane_print/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@print',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@print',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::jDdfy0uGDlHXypWj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Kcm1AsaOIrlGPn70' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/action_plane_search/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@search',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Kcm1AsaOIrlGPn70',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::m9nZDUWoBZg0sJky' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/action_plane_delete/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@delete',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::m9nZDUWoBZg0sJky',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5BYlvvpHR80KkjzD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-all-division',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getAllDivision',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getAllDivision',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5BYlvvpHR80KkjzD',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::juW95u9hQVLHzFfX' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/get-all-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getAllDepartment',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getAllDepartment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::juW95u9hQVLHzFfX',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tYGy8j35iYjgRlyr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/action-plan/get-employee-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::tYGy8j35iYjgRlyr',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::KrQ5jye422xF6bAS' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/action-plan/get-supervisor-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KrQ5jye422xF6bAS',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::hVdAoxEhld5lWkaE' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/export-action-plane-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@exportActionPlan',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@exportActionPlan',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hVdAoxEhld5lWkaE',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sLdqXSk5w7uT8Bss' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/job-description/list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@index',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::sLdqXSk5w7uT8Bss',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Nm2xGg797pBkW6wg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/job-description-store',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@store',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Nm2xGg797pBkW6wg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::QdbPjat2oLTULd2r' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/job-description-edit/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@edit',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QdbPjat2oLTULd2r',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YAm93I0gx57FhtXb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/job-description-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@update',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::YAm93I0gx57FhtXb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::z6Q7Vh8kJ4iyAhD9' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/job-description-print/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@print',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@print',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::z6Q7Vh8kJ4iyAhD9',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::G4wLz0jeh8sUOeor' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/job-description-search/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@search',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::G4wLz0jeh8sUOeor',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::U4ItkDF7MSN5MHCj' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/job-description-delete/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@delete',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::U4ItkDF7MSN5MHCj',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::UxNkAao6VdeCg1jP' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/job-description/get-employee-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UxNkAao6VdeCg1jP',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::VRB6caSJBPIksSy0' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/job-description/get-supervisor-by-employee-code',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VRB6caSJBPIksSy0',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rJtv9Feb5T1ELJQb' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/export-job-description-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@exportActionPlan',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@exportActionPlan',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rJtv9Feb5T1ELJQb',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::uzfl8DGCzVfet004' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-all-employee-training-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getEmployeeTrainingList',
        'controller' => 'App\\Http\\Controllers\\CommonController@getEmployeeTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::uzfl8DGCzVfet004',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::x0XUIeCR9oSYhLkC' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-agree-business-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getAgreeBusinessUser',
        'controller' => 'App\\Http\\Controllers\\CommonController@getAgreeBusinessUser',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::x0XUIeCR9oSYhLkC',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1Kya0iD1oImBdr5s' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-all-session',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getAllSession',
        'controller' => 'App\\Http\\Controllers\\CommonController@getAllSession',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1Kya0iD1oImBdr5s',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::TGxiEPScanTXRzNV' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{app?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\HomeController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::TGxiEPScanTXRzNV',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'app' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
