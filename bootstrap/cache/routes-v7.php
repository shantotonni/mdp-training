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
      '/_debugbar/open' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.openhandler',
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
      '/_debugbar/assets/stylesheets' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.css',
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
      '/_debugbar/assets/javascript' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.assets.js',
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
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::AqVDtMOFXrjGByCG',
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
            '_route' => 'generated::N3wMa2PqpdKib3pp',
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
      '/api/get-all-departments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JRLZpzlkjbn7AY9x',
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
      '/api/store-recruitment-requisition' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fkjrYngjwtAljL0U',
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
            '_route' => 'generated::b5OTE3GrCCAa9wYs',
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
            '_route' => 'generated::JpHUd67TXH8n8PTT',
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
            '_route' => 'generated::qqUx4wXI8YfqveKg',
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
            '_route' => 'generated::pHSS8NfH73NJo7ce',
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
            '_route' => 'generated::gDJcOxLN5PVPGJnw',
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
            '_route' => 'generated::CHPBCZipUgwd7D6S',
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
      '/api/mdp/all-mdp-print' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::st9N3ro2KMnIQMYM',
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
      '/api/mdp/approved-mdp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8JDsFXvMr3b9RRvk',
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
      '/api/mdp/export-mdp-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XJ1A7n2L8xr0w5vc',
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
      '/api/mdp/export-mdp-details-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::90n36NCnnFZq1BXG',
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
      '/api/mdp/get-export-training-history' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::shI8lk4jC4LhUapp',
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
            '_route' => 'generated::DcKJuEK7KZ4U3EKh',
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
            '_route' => 'generated::XJoJUpa5ov0wdWDb',
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
      '/api/mdp/get-all-mdp-employee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::FCYEXlM7FdfWbSCQ',
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
            '_route' => 'generated::dHov2MLdHajuqIFY',
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
            '_route' => 'generated::5nhy758FxqDLMYxZ',
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
            '_route' => 'generated::u4ytc1m3ommdO2yR',
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
      '/api/get-new-training' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::MUHWYcxiDVjxlv6M',
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
      '/api/get-employee-by-employee-code' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9sCtvuZw4KHn6wXM',
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
            '_route' => 'generated::JDVdMAyb8DRpXSIg',
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
      '/api/export-mdp-feedback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m8ARjR8qBGgm0P6i',
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
            '_route' => 'generated::QJbD6UwuZCzce5ih',
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
            '_route' => 'generated::MUnTySwHwuba9elC',
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
            '_route' => 'generated::DACEo9uWegJOpg0O',
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
            '_route' => 'generated::V6P94OnWtnEJugaQ',
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
            '_route' => 'generated::b18ahDM2SnD1aZr0',
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
            '_route' => 'generated::yWqmvsIOwUj7YmoQ',
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
            '_route' => 'generated::ZIbHD0pOY8MCc0NQ',
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
            '_route' => 'generated::0oeYSDJ2JmaT8Bwv',
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
            '_route' => 'generated::43KZSqaYIJRepgsK',
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
            '_route' => 'generated::i19wlp6iTcMa8dl6',
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
            '_route' => 'generated::I2ub8l5K8immm3BO',
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
            '_route' => 'generated::aHMR6zhXbZVLhyJX',
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
            '_route' => 'generated::ss1N4S45hEj0KEuO',
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
            '_route' => 'generated::wfRlxUiSQyImE5Td',
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
            '_route' => 'generated::JqR5RKylIilqQADC',
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
            '_route' => 'generated::u7YlT4GaYi3CAB43',
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
      '/api/export-sep-list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LNcIVkWQMy39xyZZ',
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
      '/api/sep-automation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-automation.index',
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
            '_route' => 'sep-automation.store',
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
      '/api/sep-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-department.index',
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
            '_route' => 'sep-department.store',
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
      '/api/all-portfolio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hKp7BLkGZtTlCuvg',
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
      '/api/sep-designation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-designation.index',
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
            '_route' => 'sep-designation.store',
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
      '/api/all-department' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5nRQ64IW3E3rWSL6',
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
      '/api/sep-portfolio' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-portfolio.index',
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
            '_route' => 'sep-portfolio.store',
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
      '/api/all-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::efkjg8ai4sEYXjt8',
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
      '/api/all-portfolio-by-division' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::M4SZ0WzyipMvujlc',
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
      '/api/all-designation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HWL6RFMRlisWAEJ5',
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
      '/api/job-description/list' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hgYM40sbEYoZ5lmP',
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
            '_route' => 'generated::J4Z740LgFtn9mm88',
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
            '_route' => 'generated::L9v7ljtGPWtkbQrg',
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
            '_route' => 'generated::mqrXNvRszhuNlcOB',
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
            '_route' => 'generated::qjDBc9KUWYYAOZrv',
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
            '_route' => 'generated::CFWA4dS1bcPNZpJT',
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
            '_route' => 'generated::OgnsLg8OccbjIoeD',
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
            '_route' => 'generated::lZJWdoXq2y8efn7s',
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
            '_route' => 'generated::GdFDEB4Y5H6Z6lGg',
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
            '_route' => 'generated::rCMzY49F9LoVvbkk',
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
      '/api/get-departments' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fQJjMmdGjU8NTZrZ',
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
      '/api/get-strategic-business-unit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Sp9Os4JN9v9uGJLN',
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
      '/api/get-all-chart-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vnXMugOeoKn16ZCd',
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
      '/api/mdp-pending-ptc-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TuuklgaOZZ3uLnGq',
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
      '/api/mdp-approved-ptc-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ipKRTKMODdUzbH3R',
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
      '/api/mdp-total-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::gB4pQOSVGWkgWeqr',
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
      '/api/mdp-organized-pending-ptc-title-wise-employee' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Z0bYnJKtQ6DZ3ZHp',
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
      '/api/export-training' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ThN9MoHRrcmf3UlM',
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
      '/api/get-tax-supporting-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DyJHMTaBcsHlUiYW',
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
      '/api/send-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::dGhfETx1QULLurot',
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
      '/api/verify-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::K22agd1Occf0QIV0',
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
      '/api/get-tax-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A53r8W2GQkuscRXU',
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
      '/api/get-tax-zone' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::c0sjInZWD1ArmKi7',
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
      '/api/get-tax-circle' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::B4KkqtY3ygSinOho',
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
      '/api/get-acknowledgement' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::m7YH6OHItNftsa3Q',
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
      '/api/get-periods' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::nP85eZRsgXuoWjnD',
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
      '/api/store-tax-return' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::2fo3Q30RI6BUGbqi',
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
      '/api/get-tra-report' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3NZlfaGIAuSvytVQ',
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
      '/api/get-emp-data' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::EeG2iZNhbXUvaoPh',
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
      '/api/idea-hub' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::A1iLhPWVekJ39jnt',
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
      '/api/store-idea' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::asLGtQrmkeFhGubw',
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
    ),
    2 => 
    array (
      0 => '{^(?|/_debugbar/c(?|lockwork/([^/]++)(*:39)|ache/([^/]++)(?:/([^/]++))?(*:73))|/api/(?|users/([^/]++)(?|(*:106))|se(?|arch/(?|users/([^/]++)(*:142)|sep\\-(?|automation/([^/]++)(*:177)|de(?|partment/([^/]++)(*:207)|signation/([^/]++)(*:233))|portfolio/([^/]++)(*:260)))|p\\-(?|automation/([^/]++)(?|(*:298))|de(?|partment/([^/]++)(?|(*:332))|signation/([^/]++)(?|(*:362)))|portfolio/([^/]++)(?|(*:393))))|mdp(?|/(?|edit/([^/]++)/([^/]++)(*:436)|print/([^/]++)(*:458)|search/list/([^/]++)(*:486)|delete/([^/]++)(*:509))|\\-(?|organized\\-pending\\-ptc(?|/([^/]++)(*:558)|\\-details/([^/]++)/([^/]++)(*:593))|period\\-wise\\-(?|training/([^/]++)(*:636)|feedback/([^/]++)(*:661))))|get\\-(?|level\\-wise\\-suggestive\\-list/([^/]++)(*:718)|tra\\-emp\\-list/([^/]++)/([^/]++)/([^/]++)(*:767))|action(?|\\-plane\\-edit/([^/]++)(*:807)|_plane_(?|print/([^/]++)(*:839)|search/([^/]++)(*:862)|delete/([^/]++)(*:885)))|job\\-description\\-(?|edit/([^/]++)(*:929)|print/([^/]++)(*:951)|search/([^/]++)(*:974)|delete/([^/]++)(*:997))|learning\\-transfer\\-details/([^/]++)/([^/]++)(*:1051)|feedback\\-details/([^/]++)/([^/]++)(*:1095)|idea\\-hub\\-details/([^/]++)(*:1131))|/(.*)?(*:1147))/?$}sDu',
    ),
    3 => 
    array (
      39 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.clockwork',
          ),
          1 => 
          array (
            0 => 'id',
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
      73 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'debugbar.cache.delete',
            'tags' => NULL,
          ),
          1 => 
          array (
            0 => 'key',
            1 => 'tags',
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
      106 => 
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
      142 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6aoFMUfghJxTzXE3',
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
      177 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VvKWTQ0uXvrr3cSG',
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
      207 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::aa6Xwn8PHHMtG8VZ',
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
      233 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::XVvkXhCMusGWBhOQ',
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
      260 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i3paVvK66ShkiWVb',
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
      298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-automation.show',
          ),
          1 => 
          array (
            0 => 'sep_automation',
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
            '_route' => 'sep-automation.update',
          ),
          1 => 
          array (
            0 => 'sep_automation',
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
            '_route' => 'sep-automation.destroy',
          ),
          1 => 
          array (
            0 => 'sep_automation',
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
      332 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-department.show',
          ),
          1 => 
          array (
            0 => 'sep_department',
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
            '_route' => 'sep-department.update',
          ),
          1 => 
          array (
            0 => 'sep_department',
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
            '_route' => 'sep-department.destroy',
          ),
          1 => 
          array (
            0 => 'sep_department',
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
      362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-designation.show',
          ),
          1 => 
          array (
            0 => 'sep_designation',
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
            '_route' => 'sep-designation.update',
          ),
          1 => 
          array (
            0 => 'sep_designation',
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
            '_route' => 'sep-designation.destroy',
          ),
          1 => 
          array (
            0 => 'sep_designation',
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
      393 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sep-portfolio.show',
          ),
          1 => 
          array (
            0 => 'sep_portfolio',
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
            '_route' => 'sep-portfolio.update',
          ),
          1 => 
          array (
            0 => 'sep_portfolio',
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
            '_route' => 'sep-portfolio.destroy',
          ),
          1 => 
          array (
            0 => 'sep_portfolio',
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
      436 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::04lVObjFk54iHsPe',
          ),
          1 => 
          array (
            0 => 'ID',
            1 => 'YEAR',
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
      458 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sV6oXFj3m0zPoYvw',
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
      486 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::61euiWsnCKTnPvuS',
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
      509 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xrE0XXwEnyAi9lhi',
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
      558 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Oddlk38TaIS17Nh4',
          ),
          1 => 
          array (
            0 => 'Period',
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
      593 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VYVO5TgIOx6RT2rY',
          ),
          1 => 
          array (
            0 => 'Period',
            1 => 'Status',
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
      636 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::WTBHvA8vcf35l2zn',
          ),
          1 => 
          array (
            0 => 'Period',
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
      661 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::xLbON1JyzmGCvA03',
          ),
          1 => 
          array (
            0 => 'Period',
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
      718 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::TTXoBV1szqjuRXj6',
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
      767 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HF3QmvsnJVMohVLH',
          ),
          1 => 
          array (
            0 => 'Year',
            1 => 'Dept',
            2 => 'Status',
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
      807 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::x2vHjax3EewJpK7W',
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
      839 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ijZaN0iRKR5aJUaP',
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
      862 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1quPyGu5nHeJSCik',
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
      885 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::LewA6p7VwxAmPJa4',
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
      929 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vbTYMwL9Er248nnJ',
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
      951 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8RHiUhJpPHTgkpRt',
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
      974 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BNzu5p38kP5YMIbF',
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
      997 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::KaNkFx1DxhTjQTRD',
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
      1051 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YgYFHroO6j411DWu',
          ),
          1 => 
          array (
            0 => 'Period',
            1 => 'TrainingTitle',
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
      1095 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::UlGr44YpKrqNcSDz',
          ),
          1 => 
          array (
            0 => 'Period',
            1 => 'TrainingTitle',
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
      1131 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JtviQrdR7Agxbjbh',
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
      1147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::SDerXGRsBlGcF5HZ',
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
    'debugbar.openhandler' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/open',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'as' => 'debugbar.openhandler',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@handle',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
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
    'debugbar.clockwork' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/clockwork/{id}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'as' => 'debugbar.clockwork',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\OpenHandlerController@clockwork',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
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
    'debugbar.assets.css' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/stylesheets',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'as' => 'debugbar.assets.css',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@css',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
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
    'debugbar.assets.js' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_debugbar/assets/javascript',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'as' => 'debugbar.assets.js',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\AssetController@js',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
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
    'debugbar.cache.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '_debugbar/cache/{key}/{tags?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Barryvdh\\Debugbar\\Middleware\\DebugbarEnabled',
        ),
        'uses' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'as' => 'debugbar.cache.delete',
        'controller' => 'Barryvdh\\Debugbar\\Controllers\\CacheController@delete',
        'namespace' => 'Barryvdh\\Debugbar\\Controllers',
        'prefix' => '_debugbar',
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
    'generated::AqVDtMOFXrjGByCG' => 
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
        'as' => 'generated::AqVDtMOFXrjGByCG',
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
    'generated::N3wMa2PqpdKib3pp' => 
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
        'as' => 'generated::N3wMa2PqpdKib3pp',
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
    'generated::JRLZpzlkjbn7AY9x' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-all-departments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RecruitmentController@allDepartment',
        'controller' => 'App\\Http\\Controllers\\RecruitmentController@allDepartment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JRLZpzlkjbn7AY9x',
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
    'generated::fkjrYngjwtAljL0U' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/store-recruitment-requisition',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
        ),
        'uses' => 'App\\Http\\Controllers\\RecruitmentController@storeRecruitmentRequisition',
        'controller' => 'App\\Http\\Controllers\\RecruitmentController@storeRecruitmentRequisition',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fkjrYngjwtAljL0U',
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
    'generated::b5OTE3GrCCAa9wYs' => 
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
        0 => 'throttle:10000,1',
        'uses' => 'App\\Http\\Controllers\\AuthController@logout',
        'controller' => 'App\\Http\\Controllers\\AuthController@logout',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::b5OTE3GrCCAa9wYs',
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
    'generated::JpHUd67TXH8n8PTT' => 
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
        0 => 'throttle:10000,1',
        'uses' => 'App\\Http\\Controllers\\AuthController@refresh',
        'controller' => 'App\\Http\\Controllers\\AuthController@refresh',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JpHUd67TXH8n8PTT',
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
    'generated::qqUx4wXI8YfqveKg' => 
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
        0 => 'throttle:10000,1',
        'uses' => 'App\\Http\\Controllers\\AuthController@me',
        'controller' => 'App\\Http\\Controllers\\AuthController@me',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qqUx4wXI8YfqveKg',
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
          2 => 'throttle:10000,1',
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
          2 => 'throttle:10000,1',
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
          2 => 'throttle:10000,1',
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
          2 => 'throttle:10000,1',
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
          2 => 'throttle:10000,1',
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
    'generated::6aoFMUfghJxTzXE3' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\UserController@search',
        'controller' => 'App\\Http\\Controllers\\UserController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::6aoFMUfghJxTzXE3',
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
    'generated::pHSS8NfH73NJo7ce' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@index',
        'controller' => 'App\\Http\\Controllers\\MDPController@index',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::pHSS8NfH73NJo7ce',
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
    'generated::gDJcOxLN5PVPGJnw' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@store',
        'controller' => 'App\\Http\\Controllers\\MDPController@store',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::gDJcOxLN5PVPGJnw',
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
    'generated::04lVObjFk54iHsPe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/edit/{ID}/{YEAR}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@edit',
        'controller' => 'App\\Http\\Controllers\\MDPController@edit',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::04lVObjFk54iHsPe',
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
    'generated::CHPBCZipUgwd7D6S' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@update',
        'controller' => 'App\\Http\\Controllers\\MDPController@update',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::CHPBCZipUgwd7D6S',
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
    'generated::st9N3ro2KMnIQMYM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp/all-mdp-print',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@allMDPPrint',
        'controller' => 'App\\Http\\Controllers\\MDPController@allMDPPrint',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::st9N3ro2KMnIQMYM',
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
    'generated::sV6oXFj3m0zPoYvw' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@print',
        'controller' => 'App\\Http\\Controllers\\MDPController@print',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::sV6oXFj3m0zPoYvw',
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
    'generated::61euiWsnCKTnPvuS' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/search/list/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@search',
        'controller' => 'App\\Http\\Controllers\\MDPController@search',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::61euiWsnCKTnPvuS',
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
    'generated::xrE0XXwEnyAi9lhi' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@delete',
        'controller' => 'App\\Http\\Controllers\\MDPController@delete',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::xrE0XXwEnyAi9lhi',
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
    'generated::8JDsFXvMr3b9RRvk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/approved-mdp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@approvedMDP',
        'controller' => 'App\\Http\\Controllers\\MDPController@approvedMDP',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::8JDsFXvMr3b9RRvk',
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
    'generated::XJ1A7n2L8xr0w5vc' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/export-mdp-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::XJ1A7n2L8xr0w5vc',
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
    'generated::90n36NCnnFZq1BXG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/export-mdp-details-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpDetailsExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpDetailsExport',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::90n36NCnnFZq1BXG',
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
    'generated::shI8lk4jC4LhUapp' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-export-training-history',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getExportTrainingHistory',
        'controller' => 'App\\Http\\Controllers\\MDPController@getExportTrainingHistory',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::shI8lk4jC4LhUapp',
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
    'generated::DcKJuEK7KZ4U3EKh' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getTopRankedTraining',
        'controller' => 'App\\Http\\Controllers\\MDPController@getTopRankedTraining',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::DcKJuEK7KZ4U3EKh',
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
    'generated::XJoJUpa5ov0wdWDb' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getAllMDPDepartment',
        'controller' => 'App\\Http\\Controllers\\MDPController@getAllMDPDepartment',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::XJoJUpa5ov0wdWDb',
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
    'generated::FCYEXlM7FdfWbSCQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp/get-all-mdp-employee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getAllMDPEmployee',
        'controller' => 'App\\Http\\Controllers\\MDPController@getAllMDPEmployee',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::FCYEXlM7FdfWbSCQ',
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
    'generated::dHov2MLdHajuqIFY' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getAllTrainingTitle',
        'controller' => 'App\\Http\\Controllers\\MDPController@getAllTrainingTitle',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::dHov2MLdHajuqIFY',
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
    'generated::5nhy758FxqDLMYxZ' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeWiseReport',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeWiseReport',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::5nhy758FxqDLMYxZ',
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
    'generated::u4ytc1m3ommdO2yR' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeIndividualTraining',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeIndividualTraining',
        'namespace' => NULL,
        'prefix' => 'api/mdp',
        'where' => 
        array (
        ),
        'as' => 'generated::u4ytc1m3ommdO2yR',
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
    'generated::MUHWYcxiDVjxlv6M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-new-training',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getNewTrainingOfferedList2025',
        'controller' => 'App\\Http\\Controllers\\MDPController@getNewTrainingOfferedList2025',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MUHWYcxiDVjxlv6M',
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
    'generated::9sCtvuZw4KHn6wXM' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\MDPController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::9sCtvuZw4KHn6wXM',
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
    'generated::JDVdMAyb8DRpXSIg' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\MDPController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JDVdMAyb8DRpXSIg',
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
    'generated::TTXoBV1szqjuRXj6' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@getLevelWiseSuggestiveList',
        'controller' => 'App\\Http\\Controllers\\MDPController@getLevelWiseSuggestiveList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TTXoBV1szqjuRXj6',
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
    'generated::m8ARjR8qBGgm0P6i' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpFeedbackExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpFeedbackExport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::m8ARjR8qBGgm0P6i',
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
    'generated::QJbD6UwuZCzce5ih' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseTrainingList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::QJbD6UwuZCzce5ih',
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
    'generated::MUnTySwHwuba9elC' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseSingleTrainingList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@empCodeWiseSingleTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::MUnTySwHwuba9elC',
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
    'generated::DACEo9uWegJOpg0O' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DACEo9uWegJOpg0O',
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
    'generated::V6P94OnWtnEJugaQ' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store2nd',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@store2nd',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::V6P94OnWtnEJugaQ',
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
    'generated::b18ahDM2SnD1aZr0' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@additionalTrainingAddAndFeedback',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@additionalTrainingAddAndFeedback',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::b18ahDM2SnD1aZr0',
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
    'generated::yWqmvsIOwUj7YmoQ' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getEmployeeInfo',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getEmployeeInfo',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::yWqmvsIOwUj7YmoQ',
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
    'generated::ZIbHD0pOY8MCc0NQ' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTitle',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTitle',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ZIbHD0pOY8MCc0NQ',
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
    'generated::0oeYSDJ2JmaT8Bwv' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/load-date-wise-training-wise-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTrainingWiseList',
        'controller' => 'App\\Http\\Controllers\\MDPTrainigFeedbackController@getDateWiseTrainingWiseList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::0oeYSDJ2JmaT8Bwv',
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
    'generated::43KZSqaYIJRepgsK' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@index',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::43KZSqaYIJRepgsK',
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
    'generated::i19wlp6iTcMa8dl6' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@store',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::i19wlp6iTcMa8dl6',
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
    'generated::x2vHjax3EewJpK7W' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@edit',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::x2vHjax3EewJpK7W',
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
    'generated::I2ub8l5K8immm3BO' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@update',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::I2ub8l5K8immm3BO',
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
    'generated::ijZaN0iRKR5aJUaP' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@print',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@print',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ijZaN0iRKR5aJUaP',
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
    'generated::1quPyGu5nHeJSCik' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@search',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::1quPyGu5nHeJSCik',
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
    'generated::LewA6p7VwxAmPJa4' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@delete',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LewA6p7VwxAmPJa4',
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
    'generated::aHMR6zhXbZVLhyJX' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getAllDivision',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getAllDivision',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aHMR6zhXbZVLhyJX',
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
    'generated::ss1N4S45hEj0KEuO' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getAllDepartment',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getAllDepartment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ss1N4S45hEj0KEuO',
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
    'generated::wfRlxUiSQyImE5Td' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wfRlxUiSQyImE5Td',
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
    'generated::JqR5RKylIilqQADC' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JqR5RKylIilqQADC',
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
    'generated::u7YlT4GaYi3CAB43' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\ActionPlanController@exportActionPlan',
        'controller' => 'App\\Http\\Controllers\\ActionPlanController@exportActionPlan',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::u7YlT4GaYi3CAB43',
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
    'generated::LNcIVkWQMy39xyZZ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/export-sep-list',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@exportSep',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@exportSep',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::LNcIVkWQMy39xyZZ',
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
    'sep-automation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-automation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-automation.index',
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@index',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@index',
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
    'sep-automation.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sep-automation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-automation.store',
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@store',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@store',
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
    'sep-automation.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-automation/{sep_automation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-automation.show',
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@show',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@show',
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
    'sep-automation.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/sep-automation/{sep_automation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-automation.update',
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@update',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@update',
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
    'sep-automation.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/sep-automation/{sep_automation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-automation.destroy',
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@destroy',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@destroy',
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
    'generated::VvKWTQ0uXvrr3cSG' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/sep-automation/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@search',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VvKWTQ0uXvrr3cSG',
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
    'sep-department.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-department.index',
        'uses' => 'App\\Http\\Controllers\\DepartmentController@index',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@index',
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
    'sep-department.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sep-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-department.store',
        'uses' => 'App\\Http\\Controllers\\DepartmentController@store',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@store',
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
    'sep-department.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-department/{sep_department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-department.show',
        'uses' => 'App\\Http\\Controllers\\DepartmentController@show',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@show',
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
    'sep-department.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/sep-department/{sep_department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-department.update',
        'uses' => 'App\\Http\\Controllers\\DepartmentController@update',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@update',
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
    'sep-department.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/sep-department/{sep_department}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-department.destroy',
        'uses' => 'App\\Http\\Controllers\\DepartmentController@destroy',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@destroy',
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
    'generated::aa6Xwn8PHHMtG8VZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/sep-department/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\DepartmentController@search',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::aa6Xwn8PHHMtG8VZ',
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
    'generated::hKp7BLkGZtTlCuvg' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/all-portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\DepartmentController@allPortfolio',
        'controller' => 'App\\Http\\Controllers\\DepartmentController@allPortfolio',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hKp7BLkGZtTlCuvg',
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
    'sep-designation.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-designation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-designation.index',
        'uses' => 'App\\Http\\Controllers\\DesignationController@index',
        'controller' => 'App\\Http\\Controllers\\DesignationController@index',
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
    'sep-designation.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sep-designation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-designation.store',
        'uses' => 'App\\Http\\Controllers\\DesignationController@store',
        'controller' => 'App\\Http\\Controllers\\DesignationController@store',
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
    'sep-designation.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-designation/{sep_designation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-designation.show',
        'uses' => 'App\\Http\\Controllers\\DesignationController@show',
        'controller' => 'App\\Http\\Controllers\\DesignationController@show',
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
    'sep-designation.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/sep-designation/{sep_designation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-designation.update',
        'uses' => 'App\\Http\\Controllers\\DesignationController@update',
        'controller' => 'App\\Http\\Controllers\\DesignationController@update',
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
    'sep-designation.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/sep-designation/{sep_designation}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-designation.destroy',
        'uses' => 'App\\Http\\Controllers\\DesignationController@destroy',
        'controller' => 'App\\Http\\Controllers\\DesignationController@destroy',
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
    'generated::XVvkXhCMusGWBhOQ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/sep-designation/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\DesignationController@search',
        'controller' => 'App\\Http\\Controllers\\DesignationController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::XVvkXhCMusGWBhOQ',
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
    'generated::5nRQ64IW3E3rWSL6' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/all-department',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\DesignationController@allDepartment',
        'controller' => 'App\\Http\\Controllers\\DesignationController@allDepartment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::5nRQ64IW3E3rWSL6',
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
    'sep-portfolio.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-portfolio.index',
        'uses' => 'App\\Http\\Controllers\\PortfolioController@index',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@index',
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
    'sep-portfolio.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/sep-portfolio',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-portfolio.store',
        'uses' => 'App\\Http\\Controllers\\PortfolioController@store',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@store',
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
    'sep-portfolio.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/sep-portfolio/{sep_portfolio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-portfolio.show',
        'uses' => 'App\\Http\\Controllers\\PortfolioController@show',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@show',
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
    'sep-portfolio.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'api/sep-portfolio/{sep_portfolio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-portfolio.update',
        'uses' => 'App\\Http\\Controllers\\PortfolioController@update',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@update',
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
    'sep-portfolio.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'api/sep-portfolio/{sep_portfolio}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'as' => 'sep-portfolio.destroy',
        'uses' => 'App\\Http\\Controllers\\PortfolioController@destroy',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@destroy',
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
    'generated::i3paVvK66ShkiWVb' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/search/sep-portfolio/{query}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\PortfolioController@search',
        'controller' => 'App\\Http\\Controllers\\PortfolioController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::i3paVvK66ShkiWVb',
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
    'generated::efkjg8ai4sEYXjt8' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/all-division',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@allDivision',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@allDivision',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::efkjg8ai4sEYXjt8',
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
    'generated::M4SZ0WzyipMvujlc' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/all-portfolio-by-division',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@allPortfolio',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@allPortfolio',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::M4SZ0WzyipMvujlc',
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
    'generated::HWL6RFMRlisWAEJ5' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/all-designation',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\SEPAutomationController@allDesignation',
        'controller' => 'App\\Http\\Controllers\\SEPAutomationController@allDesignation',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HWL6RFMRlisWAEJ5',
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
    'generated::hgYM40sbEYoZ5lmP' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@index',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::hgYM40sbEYoZ5lmP',
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
    'generated::J4Z740LgFtn9mm88' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@store',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::J4Z740LgFtn9mm88',
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
    'generated::vbTYMwL9Er248nnJ' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@edit',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::vbTYMwL9Er248nnJ',
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
    'generated::L9v7ljtGPWtkbQrg' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@update',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@update',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::L9v7ljtGPWtkbQrg',
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
    'generated::8RHiUhJpPHTgkpRt' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@print',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@print',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::8RHiUhJpPHTgkpRt',
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
    'generated::BNzu5p38kP5YMIbF' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@search',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::BNzu5p38kP5YMIbF',
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
    'generated::KaNkFx1DxhTjQTRD' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@delete',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@delete',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::KaNkFx1DxhTjQTRD',
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
    'generated::mqrXNvRszhuNlcOB' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@approvedJobDescription',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@approvedJobDescription',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::mqrXNvRszhuNlcOB',
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
    'generated::qjDBc9KUWYYAOZrv' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@getEmployeeByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@getEmployeeByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::qjDBc9KUWYYAOZrv',
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
    'generated::CFWA4dS1bcPNZpJT' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@getSupervisorByEmployeeCode',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@getSupervisorByEmployeeCode',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::CFWA4dS1bcPNZpJT',
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
    'generated::OgnsLg8OccbjIoeD' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\JobDescriptionController@exportActionPlan',
        'controller' => 'App\\Http\\Controllers\\JobDescriptionController@exportActionPlan',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::OgnsLg8OccbjIoeD',
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
    'generated::lZJWdoXq2y8efn7s' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getEmployeeTrainingList',
        'controller' => 'App\\Http\\Controllers\\CommonController@getEmployeeTrainingList',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::lZJWdoXq2y8efn7s',
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
    'generated::GdFDEB4Y5H6Z6lGg' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getAgreeBusinessUser',
        'controller' => 'App\\Http\\Controllers\\CommonController@getAgreeBusinessUser',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::GdFDEB4Y5H6Z6lGg',
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
    'generated::rCMzY49F9LoVvbkk' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getAllSession',
        'controller' => 'App\\Http\\Controllers\\CommonController@getAllSession',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rCMzY49F9LoVvbkk',
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
    'generated::fQJjMmdGjU8NTZrZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-departments',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@department',
        'controller' => 'App\\Http\\Controllers\\CommonController@department',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fQJjMmdGjU8NTZrZ',
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
    'generated::Sp9Os4JN9v9uGJLN' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-strategic-business-unit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\CommonController@getSBU',
        'controller' => 'App\\Http\\Controllers\\CommonController@getSBU',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Sp9Os4JN9v9uGJLN',
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
    'generated::vnXMugOeoKn16ZCd' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-all-chart-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getAllChartReport',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getAllChartReport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::vnXMugOeoKn16ZCd',
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
    'generated::Oddlk38TaIS17Nh4' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp-organized-pending-ptc/{Period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTC',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTC',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Oddlk38TaIS17Nh4',
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
    'generated::VYVO5TgIOx6RT2rY' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp-organized-pending-ptc-details/{Period}/{Status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTCDetails',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTCDetails',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::VYVO5TgIOx6RT2rY',
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
    'generated::TuuklgaOZZ3uLnGq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp-pending-ptc-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getPendingPTCReport',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getPendingPTCReport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::TuuklgaOZZ3uLnGq',
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
    'generated::ipKRTKMODdUzbH3R' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp-approved-ptc-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getApprovedPTCReport',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getApprovedPTCReport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ipKRTKMODdUzbH3R',
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
    'generated::gB4pQOSVGWkgWeqr' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp-total-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@mdpTotalReport',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@mdpTotalReport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::gB4pQOSVGWkgWeqr',
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
    'generated::Z0bYnJKtQ6DZ3ZHp' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/mdp-organized-pending-ptc-title-wise-employee',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTCTitleWiseEmployee',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@getOrganizedPendingPTCTitleWiseEmployee',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Z0bYnJKtQ6DZ3ZHp',
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
    'generated::WTBHvA8vcf35l2zn' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp-period-wise-training/{Period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseTraining',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseTraining',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::WTBHvA8vcf35l2zn',
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
    'generated::YgYFHroO6j411DWu' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/learning-transfer-details/{Period}/{TrainingTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@MDPLearningTransferDetails',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@MDPLearningTransferDetails',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::YgYFHroO6j411DWu',
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
    'generated::ThN9MoHRrcmf3UlM' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/export-training',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@exportTraining',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@exportTraining',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::ThN9MoHRrcmf3UlM',
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
    'generated::xLbON1JyzmGCvA03' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/mdp-period-wise-feedback/{Period}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseFeedback',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseFeedback',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::xLbON1JyzmGCvA03',
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
    'generated::UlGr44YpKrqNcSDz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/feedback-details/{Period}/{TrainingTitle}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseFeedbackDetails',
        'controller' => 'App\\Http\\Controllers\\MDPChartController@MDPPeriodWiseFeedbackDetails',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::UlGr44YpKrqNcSDz',
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
    'generated::DyJHMTaBcsHlUiYW' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-tax-supporting-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxController@getSupportingData',
        'controller' => 'App\\Http\\Controllers\\TaxController@getSupportingData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::DyJHMTaBcsHlUiYW',
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
    'generated::dGhfETx1QULLurot' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/send-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxController@sendOTP',
        'controller' => 'App\\Http\\Controllers\\TaxController@sendOTP',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::dGhfETx1QULLurot',
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
    'generated::K22agd1Occf0QIV0' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/verify-otp',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxController@verifyOTP',
        'controller' => 'App\\Http\\Controllers\\TaxController@verifyOTP',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::K22agd1Occf0QIV0',
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
    'generated::A53r8W2GQkuscRXU' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-tax-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TaxController@getTaxData',
        'controller' => 'App\\Http\\Controllers\\TaxController@getTaxData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::A53r8W2GQkuscRXU',
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
    'generated::c0sjInZWD1ArmKi7' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-tax-zone',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@getTaxZone',
        'controller' => 'App\\Http\\Controllers\\TRAController@getTaxZone',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::c0sjInZWD1ArmKi7',
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
    'generated::B4KkqtY3ygSinOho' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-tax-circle',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@getTaxCircle',
        'controller' => 'App\\Http\\Controllers\\TRAController@getTaxCircle',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::B4KkqtY3ygSinOho',
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
    'generated::m7YH6OHItNftsa3Q' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-acknowledgement',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@getAcknowledgment',
        'controller' => 'App\\Http\\Controllers\\TRAController@getAcknowledgment',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::m7YH6OHItNftsa3Q',
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
    'generated::nP85eZRsgXuoWjnD' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-periods',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@getPeriods',
        'controller' => 'App\\Http\\Controllers\\TRAController@getPeriods',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::nP85eZRsgXuoWjnD',
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
    'generated::2fo3Q30RI6BUGbqi' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/store-tax-return',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@storeTaxReturn',
        'controller' => 'App\\Http\\Controllers\\TRAController@storeTaxReturn',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::2fo3Q30RI6BUGbqi',
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
    'generated::3NZlfaGIAuSvytVQ' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/get-tra-report',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@index',
        'controller' => 'App\\Http\\Controllers\\TRAController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::3NZlfaGIAuSvytVQ',
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
    'generated::HF3QmvsnJVMohVLH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-tra-emp-list/{Year}/{Dept}/{Status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@taxableEmp',
        'controller' => 'App\\Http\\Controllers\\TRAController@taxableEmp',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::HF3QmvsnJVMohVLH',
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
    'generated::EeG2iZNhbXUvaoPh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/get-emp-data',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\TRAController@getViewEmpData',
        'controller' => 'App\\Http\\Controllers\\TRAController@getViewEmpData',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::EeG2iZNhbXUvaoPh',
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
    'generated::A1iLhPWVekJ39jnt' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/idea-hub',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\IdeaHubController@index',
        'controller' => 'App\\Http\\Controllers\\IdeaHubController@index',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::A1iLhPWVekJ39jnt',
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
    'generated::JtviQrdR7Agxbjbh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/idea-hub-details/{ID}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\IdeaHubController@show',
        'controller' => 'App\\Http\\Controllers\\IdeaHubController@show',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::JtviQrdR7Agxbjbh',
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
    'generated::asLGtQrmkeFhGubw' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/store-idea',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'jwt',
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\IdeaHubController@store',
        'controller' => 'App\\Http\\Controllers\\IdeaHubController@store',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::asLGtQrmkeFhGubw',
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
    'generated::SDerXGRsBlGcF5HZ' => 
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
        'as' => 'generated::SDerXGRsBlGcF5HZ',
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
