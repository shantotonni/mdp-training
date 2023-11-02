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
            '_route' => 'generated::gW5G9J0WSx80TPuT',
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
            '_route' => 'generated::lG9lgyfztctBM0jt',
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
            '_route' => 'generated::Jh1vaacEhLicf5ay',
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
            '_route' => 'generated::M6EUW8Kj3tVk8XZj',
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
            '_route' => 'generated::pjcqbK6pNtGNvZSw',
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
      '/api/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.index',
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
        1 => 
        array (
          0 => 
          array (
            '_route' => 'users.store',
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
      '/api/mdp/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::thZsgQh2FiBcFXpg',
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
            '_route' => 'generated::GuFPca8i4EnmA5AX',
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
            '_route' => 'generated::WUYSq06OhGb83nVb',
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
            '_route' => 'generated::U55rcvZUGN61veJJ',
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
            '_route' => 'generated::cHgDVH1aqpHMyoHP',
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
            '_route' => 'generated::rOd6QmlOPybZ9xYI',
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
      '/api/export-mdp-feedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::QD55Vjzu2VCv5zjv',
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
            '_route' => 'generated::hSb9iKmbXNh1t1CI',
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
            '_route' => 'generated::rMDVOB73tUrx53L8',
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
      '/api/mdp/get-all-training-title' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4FPOQo84TKNqXwRt',
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
      '/api/mdp/get-employee-wise-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YOhAghQZXtrG68M6',
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
      '/api/mdp/get-employee-individual-training' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yqnqi784QlEHxZlG',
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
            '_route' => 'generated::wnzphbqjhgi2avX2',
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
            '_route' => 'generated::EMQVwVTfWaK5pmNi',
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
            '_route' => 'generated::FMyuBzfYz4xaRml3',
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
      '/api/training-feedback-submit-2nd' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MkaM7JKGFJY0EvgF',
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
            '_route' => 'generated::rWsKaLXmlRUayooH',
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
      '/api/get-employee-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bI60UWjCG2xNUZvI',
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
      '/api/load-date-wise-title' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::qQ6p6LQcXlXxdrU0',
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
      '/api/load-date-wise-training-wise-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A3nwsuSGHFPJGno8',
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
      '/api/action-plane/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::wJa5hpgn0pvp3hJM',
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
            '_route' => 'generated::zRlvHN0dbXa1sjiu',
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
            '_route' => 'generated::9LuuB5JJshA5jIZK',
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
            '_route' => 'generated::fjD1HQrNkkYdWPkE',
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
            '_route' => 'generated::vwbZw7QjntWH7jWO',
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
            '_route' => 'generated::ZeEKhn5wGzbuQQWw',
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
            '_route' => 'generated::0IPhIELyxTJlMQVc',
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
            '_route' => 'generated::nkwaKQw9HcZtvJaQ',
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
            '_route' => 'generated::EM55reYl47nkqPOO',
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
            '_route' => 'generated::K8mhjUkfg3tDoLDX',
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
            '_route' => 'generated::Whp9Dp3UXYpdVrgU',
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
      '/api/approved-job-description' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FMXGMKKg3XAzUCsP',
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
      '/api/job-description/get-employee-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2E2NJ9XuMfIG8F6L',
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
            '_route' => 'generated::pUFCDHWXjV7FSfhB',
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
            '_route' => 'generated::rquvoUd6kF4qKCUp',
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
            '_route' => 'generated::L4h2fbmvIP9iflNC',
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
            '_route' => 'generated::eaqH5bxMLj3mrRaO',
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
            '_route' => 'generated::f2u1rIeTZe1ohyEq',
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
      0 => '{^(?|/api/(?|users/([^/]++)(?|(*:32))|search/(?|users/([^/]++)(*:64)|mdp/list/([^/]++)(*:88))|mdp/(?|edit/([^/]++)(*:116)|print/([^/]++)(*:138)|delete/([^/]++)(*:161))|get\\-level\\-wise\\-suggestive\\-list/([^/]++)(*:213)|action(?|\\-plane\\-edit/([^/]++)(*:252)|_plane_(?|print/([^/]++)(*:284)|search/([^/]++)(*:307)|delete/([^/]++)(*:330)))|job\\-description\\-(?|edit/([^/]++)(*:374)|print/([^/]++)(*:396)|search/([^/]++)(*:419)|delete/([^/]++)(*:442)))|/(.*)?(*:458))/?$}sDu',
    ),
    3 => 
    array (
      32 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'users.show',
          ),
          1 => 
          array (
            0 => 'user',
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
          0 => 
          array (
            '_route' => 'users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
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
      64 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2LXsrZHPIDVTc8QW',
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
      88 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BrNWubvMvWpiMquO',
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
      116 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::u1IyLWuIo8xKowV1',
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
      138 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::93gYuvbv0o6jk3kG',
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
      161 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3WbgeRHXjiFY0wrs',
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
      213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7vxTM0lOyv5l1HMk',
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
      252 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::cwKeK8Etb34KkHrc',
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
      284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::203nMAiBFUPI2PW9',
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
      307 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::U9LJL379E0NXdKn5',
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
      330 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2yvF3ljqwSpHsSAV',
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
      374 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VFsbhnKjq7guIiOw',
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
      396 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rIxbZxNOiHLaims4',
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
      419 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4NFPigOxvvCS5Skb',
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
      442 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UW2kOR3JQ9Zwi8iV',
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
      458 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MfkKN44GkLeWo3fA',
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
    'generated::gW5G9J0WSx80TPuT' => 
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
        'as' => 'generated::gW5G9J0WSx80TPuT',
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
    'generated::lG9lgyfztctBM0jt' => 
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
        'as' => 'generated::lG9lgyfztctBM0jt',
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
    'generated::Jh1vaacEhLicf5ay' => 
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
        'as' => 'generated::Jh1vaacEhLicf5ay',
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
    'generated::M6EUW8Kj3tVk8XZj' => 
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
        'as' => 'generated::M6EUW8Kj3tVk8XZj',
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
    'generated::pjcqbK6pNtGNvZSw' => 
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
        'as' => 'generated::pjcqbK6pNtGNvZSw',
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
    'users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'as' => 'users.index',
        'uses' => 'App\\Http\\Controllers\\UserController@index',
        'controller' => 'App\\Http\\Controllers\\UserController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
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
    'users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'as' => 'users.store',
        'uses' => 'App\\Http\\Controllers\\UserController@store',
        'controller' => 'App\\Http\\Controllers\\UserController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
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
    'users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'as' => 'users.show',
        'uses' => 'App\\Http\\Controllers\\UserController@show',
        'controller' => 'App\\Http\\Controllers\\UserController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
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
    'users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'as' => 'users.update',
        'uses' => 'App\\Http\\Controllers\\UserController@update',
        'controller' => 'App\\Http\\Controllers\\UserController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
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
    'users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'as' => 'users.destroy',
        'uses' => 'App\\Http\\Controllers\\UserController@destroy',
        'controller' => 'App\\Http\\Controllers\\UserController@destroy',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
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
    'generated::2LXsrZHPIDVTc8QW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/users/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@search',
        'controller' => 'App\\Http\\Controllers\\UserController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2LXsrZHPIDVTc8QW',
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
    'generated::thZsgQh2FiBcFXpg' => 
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
        'as' => 'generated::thZsgQh2FiBcFXpg',
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
    'generated::GuFPca8i4EnmA5AX' => 
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
        'as' => 'generated::GuFPca8i4EnmA5AX',
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
    'generated::u1IyLWuIo8xKowV1' => 
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
        'as' => 'generated::u1IyLWuIo8xKowV1',
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
    'generated::WUYSq06OhGb83nVb' => 
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
        'as' => 'generated::WUYSq06OhGb83nVb',
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
    'generated::93gYuvbv0o6jk3kG' => 
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
        'as' => 'generated::93gYuvbv0o6jk3kG',
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
    'generated::BrNWubvMvWpiMquO' => 
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
        'as' => 'generated::BrNWubvMvWpiMquO',
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
    'generated::3WbgeRHXjiFY0wrs' => 
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
        'as' => 'generated::3WbgeRHXjiFY0wrs',
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
    'generated::U55rcvZUGN61veJJ' => 
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
        'as' => 'generated::U55rcvZUGN61veJJ',
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
    'generated::cHgDVH1aqpHMyoHP' => 
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
        'as' => 'generated::cHgDVH1aqpHMyoHP',
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
    'generated::7vxTM0lOyv5l1HMk' => 
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
        'as' => 'generated::7vxTM0lOyv5l1HMk',
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
    'generated::rOd6QmlOPybZ9xYI' => 
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
        'as' => 'generated::rOd6QmlOPybZ9xYI',
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
    'generated::QD55Vjzu2VCv5zjv' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/export-mdp-feedback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpFeedbackExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpFeedbackExport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QD55Vjzu2VCv5zjv',
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
    'generated::hSb9iKmbXNh1t1CI' => 
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
        'as' => 'generated::hSb9iKmbXNh1t1CI',
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
    'generated::rMDVOB73tUrx53L8' => 
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
        'as' => 'generated::rMDVOB73tUrx53L8',
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
    'generated::4FPOQo84TKNqXwRt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-all-training-title',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getAllTrainingTitle',
        'controller' => 'App\\Http\\Controllers\\MDPController@getAllTrainingTitle',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::4FPOQo84TKNqXwRt',
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
    'generated::YOhAghQZXtrG68M6' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp/get-employee-wise-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeWiseReport',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeWiseReport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::YOhAghQZXtrG68M6',
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
    'generated::yqnqi784QlEHxZlG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-employee-individual-training',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeIndividualTraining',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeIndividualTraining',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::yqnqi784QlEHxZlG',
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
    'generated::wnzphbqjhgi2avX2' => 
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
        'as' => 'generated::wnzphbqjhgi2avX2',
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
    'generated::EMQVwVTfWaK5pmNi' => 
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
        'as' => 'generated::EMQVwVTfWaK5pmNi',
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
    'generated::FMyuBzfYz4xaRml3' => 
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
        'as' => 'generated::FMyuBzfYz4xaRml3',
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
    'generated::MkaM7JKGFJY0EvgF' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/training-feedback-submit-2nd',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store2nd',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store2nd',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MkaM7JKGFJY0EvgF',
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
    'generated::rWsKaLXmlRUayooH' => 
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
        'as' => 'generated::rWsKaLXmlRUayooH',
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
    'generated::bI60UWjCG2xNUZvI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-employee-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getEmployeeInfo',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getEmployeeInfo',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bI60UWjCG2xNUZvI',
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
    'generated::qQ6p6LQcXlXxdrU0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/load-date-wise-title',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTitle',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTitle',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qQ6p6LQcXlXxdrU0',
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
    'generated::A3nwsuSGHFPJGno8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/load-date-wise-training-wise-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTrainingWiseList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTrainingWiseList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::A3nwsuSGHFPJGno8',
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
    'generated::wJa5hpgn0pvp3hJM' => 
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
        'as' => 'generated::wJa5hpgn0pvp3hJM',
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
    'generated::zRlvHN0dbXa1sjiu' => 
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
        'as' => 'generated::zRlvHN0dbXa1sjiu',
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
    'generated::cwKeK8Etb34KkHrc' => 
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
        'as' => 'generated::cwKeK8Etb34KkHrc',
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
    'generated::9LuuB5JJshA5jIZK' => 
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
        'as' => 'generated::9LuuB5JJshA5jIZK',
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
    'generated::203nMAiBFUPI2PW9' => 
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
        'as' => 'generated::203nMAiBFUPI2PW9',
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
    'generated::U9LJL379E0NXdKn5' => 
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
        'as' => 'generated::U9LJL379E0NXdKn5',
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
    'generated::2yvF3ljqwSpHsSAV' => 
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
        'as' => 'generated::2yvF3ljqwSpHsSAV',
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
    'generated::fjD1HQrNkkYdWPkE' => 
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
        'as' => 'generated::fjD1HQrNkkYdWPkE',
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
    'generated::vwbZw7QjntWH7jWO' => 
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
        'as' => 'generated::vwbZw7QjntWH7jWO',
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
    'generated::ZeEKhn5wGzbuQQWw' => 
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
        'as' => 'generated::ZeEKhn5wGzbuQQWw',
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
    'generated::0IPhIELyxTJlMQVc' => 
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
        'as' => 'generated::0IPhIELyxTJlMQVc',
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
    'generated::nkwaKQw9HcZtvJaQ' => 
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
        'as' => 'generated::nkwaKQw9HcZtvJaQ',
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
    'generated::EM55reYl47nkqPOO' => 
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
        'as' => 'generated::EM55reYl47nkqPOO',
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
    'generated::K8mhjUkfg3tDoLDX' => 
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
        'as' => 'generated::K8mhjUkfg3tDoLDX',
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
    'generated::VFsbhnKjq7guIiOw' => 
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
        'as' => 'generated::VFsbhnKjq7guIiOw',
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
    'generated::Whp9Dp3UXYpdVrgU' => 
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
        'as' => 'generated::Whp9Dp3UXYpdVrgU',
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
    'generated::rIxbZxNOiHLaims4' => 
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
        'as' => 'generated::rIxbZxNOiHLaims4',
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
    'generated::4NFPigOxvvCS5Skb' => 
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
        'as' => 'generated::4NFPigOxvvCS5Skb',
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
    'generated::UW2kOR3JQ9Zwi8iV' => 
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
        'as' => 'generated::UW2kOR3JQ9Zwi8iV',
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
    'generated::FMXGMKKg3XAzUCsP' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/approved-job-description',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@approvedJobDescription',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@approvedJobDescription',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::FMXGMKKg3XAzUCsP',
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
    'generated::2E2NJ9XuMfIG8F6L' => 
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
        'as' => 'generated::2E2NJ9XuMfIG8F6L',
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
    'generated::pUFCDHWXjV7FSfhB' => 
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
        'as' => 'generated::pUFCDHWXjV7FSfhB',
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
    'generated::rquvoUd6kF4qKCUp' => 
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
        'as' => 'generated::rquvoUd6kF4qKCUp',
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
    'generated::L4h2fbmvIP9iflNC' => 
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
        'as' => 'generated::L4h2fbmvIP9iflNC',
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
    'generated::eaqH5bxMLj3mrRaO' => 
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
        'as' => 'generated::eaqH5bxMLj3mrRaO',
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
    'generated::f2u1rIeTZe1ohyEq' => 
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
        'as' => 'generated::f2u1rIeTZe1ohyEq',
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
    'generated::MfkKN44GkLeWo3fA' => 
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
        'as' => 'generated::MfkKN44GkLeWo3fA',
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
