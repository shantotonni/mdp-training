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
            '_route' => 'generated::yRZCZ7WsLAwmJjeL',
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
            '_route' => 'generated::WeGQMsJvDfSPFELZ',
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
            '_route' => 'generated::sNAFDpajkEspUUTE',
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
            '_route' => 'generated::cyabgN0fSXqGbMrR',
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
            '_route' => 'generated::ZGwksILRLHnQmc9F',
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
            '_route' => 'generated::Fr0gVXU4iKCE4BPX',
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
            '_route' => 'generated::0rQxjdOBriCSG9L4',
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
            '_route' => 'generated::pV9NukSzTLqzqgRA',
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
            '_route' => 'generated::AA4h0vKClP8eTAxX',
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
            '_route' => 'generated::Ow4xU9OXzVobLU0a',
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
      '/api/approved-mdp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::i10UB88KiNsur2Nh',
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
            '_route' => 'generated::jaALHzMh5cR8jD3w',
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
            '_route' => 'generated::kUtarBPnLlkJeL8p',
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
            '_route' => 'generated::wDr5EqjBr52gyqL6',
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
            '_route' => 'generated::DNTiPmIbxl3dD2H9',
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
            '_route' => 'generated::zVqAC3dtVDq30MgV',
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
            '_route' => 'generated::Q3FZb7UGfsEaIP4f',
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
            '_route' => 'generated::FIBAFG2JvRCZVzu8',
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
            '_route' => 'generated::SRUd6CLLBXufhXd4',
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
            '_route' => 'generated::3WOXC0pgN11AQTdi',
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
            '_route' => 'generated::ueFbmk2ZJDKbrFwu',
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
            '_route' => 'generated::ssckqJavoNSEg9yw',
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
            '_route' => 'generated::WMrVsotUs1bEtPLB',
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
            '_route' => 'generated::CjbCSPx0RNDkL5Cy',
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
            '_route' => 'generated::bUlHEOWeeLAPPtGR',
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
            '_route' => 'generated::yfnvCcLKpT14oYmr',
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
            '_route' => 'generated::mBW7cmcPtgaXlldG',
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
            '_route' => 'generated::G9rzSkuxoEqs2MvB',
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
            '_route' => 'generated::mHM9ozMT7pgjxghY',
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
            '_route' => 'generated::GvYEpFHpiFeywHFO',
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
            '_route' => 'generated::FK6yAzs0K2i5IAye',
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
            '_route' => 'generated::5SJuxL8o0Hu51ECp',
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
            '_route' => 'generated::4TnT792Kh9RndAmc',
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
            '_route' => 'generated::5IlXRQYSfPwmrzS8',
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
            '_route' => 'generated::FbBOTfzlYbch6Zi3',
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
            '_route' => 'generated::k9KD3NHgmTXdxBlR',
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
            '_route' => 'generated::OffD9XS6TSYuWzs4',
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
            '_route' => 'generated::t5GXw0qAMz6UUM3i',
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
            '_route' => 'generated::Daq2LbguDIY7tNi1',
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
            '_route' => 'generated::efJnAVXzZXsqpLA0',
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
            '_route' => 'generated::AsadmzGNABy7BWmI',
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
            '_route' => 'generated::tWrutR0Fy3YNA4Eu',
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
            '_route' => 'generated::KjxBhJaieeun4REd',
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
            '_route' => 'generated::Jb3e2PTwqBGwAUN9',
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
            '_route' => 'generated::kulPE0BMmtYugaKs',
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
            '_route' => 'generated::FrCvwwd2cbbmHheT',
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
            '_route' => 'generated::1xvLnSahHTa7qKk0',
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
            '_route' => 'generated::rMHhdaI7oTt5mGZa',
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
            '_route' => 'generated::l0EhZDUc4bLt9cWX',
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
            '_route' => 'generated::53h4aCO1fYe5iLYV',
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
            '_route' => 'generated::XjrEFoPyMmIzK2im',
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
            '_route' => 'generated::7UxbeWdH3P3Knepb',
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
            '_route' => 'generated::UIzhPbdoJNiZsPmx',
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
            '_route' => 'generated::gwh7vZbUmPu3NXW4',
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
            '_route' => 'generated::PmuA6A3AkGLngmWF',
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
            '_route' => 'generated::u9kBYHrpIXVY7mmb',
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
            '_route' => 'generated::9HNWo0rXbBMAemA2',
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
      '/api/send-otp' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::JQMws1tRk1vCiuC3',
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
            '_route' => 'generated::ae3kc3fyi9VDIHMt',
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
            '_route' => 'generated::U2VyDhylbX5nIYuS',
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
      0 => '{^(?|/api/(?|users/([^/]++)(?|(*:32))|se(?|arch/(?|users/([^/]++)(*:67)|mdp/list/([^/]++)(*:91)|sep\\-(?|automation/([^/]++)(*:125)|de(?|partment/([^/]++)(*:155)|signation/([^/]++)(*:181))|portfolio/([^/]++)(*:208)))|p\\-(?|automation/([^/]++)(?|(*:246))|de(?|partment/([^/]++)(?|(*:280))|signation/([^/]++)(?|(*:310)))|portfolio/([^/]++)(?|(*:341))))|mdp(?|/(?|edit/([^/]++)(*:375)|print/([^/]++)(*:397)|delete/([^/]++)(*:420))|\\-(?|organized\\-pending\\-ptc(?|/([^/]++)(*:469)|\\-details/([^/]++)/([^/]++)(*:504))|period\\-wise\\-(?|training/([^/]++)(*:547)|feedback/([^/]++)(*:572))))|get\\-level\\-wise\\-suggestive\\-list/([^/]++)(*:626)|action(?|\\-plane\\-edit/([^/]++)(*:665)|_plane_(?|print/([^/]++)(*:697)|search/([^/]++)(*:720)|delete/([^/]++)(*:743)))|job\\-description\\-(?|edit/([^/]++)(*:787)|print/([^/]++)(*:809)|search/([^/]++)(*:832)|delete/([^/]++)(*:855))|learning\\-transfer\\-details/([^/]++)/([^/]++)(*:909)|feedback\\-details/([^/]++)/([^/]++)(*:952))|/(.*)?(*:967))/?$}sDu',
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
      67 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::3XVk2ZdxKyM7X3eW',
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
      91 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NhslNkRTn93wxrhd',
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
      125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ax1lqcMfdmEA2abp',
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
      155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bLf7jy63sH70G7Yj',
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
      181 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::DXEePLM9wjBMkHjv',
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
      208 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mXrFRff8NkqK4Ow6',
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
      246 => 
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
      280 => 
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
      310 => 
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
      341 => 
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
      375 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::bRbScNtjmNL4xdwH',
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
      397 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fwYVKjWhdCG9t8pM',
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
      420 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::v7geZclOov0jfobu',
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
      469 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4d0MjyKECJbRDKkO',
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
      504 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::vX8s6R7S7X2hMdEv',
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
      547 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::mbPOasRK0dfxDacU',
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
      572 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::flP4FMudp06pzwJQ',
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
      626 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::o50IQlYCPV17ujIz',
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
      665 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eDe0XZaBzU7lAFZD',
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
      697 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hjvLOkLSBNmHeEiY',
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
      720 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::VPL9iumqKIpKUSiX',
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
      743 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::echDN3XOIrVqXSAz',
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
      787 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YtXCwxYBwceg54tT',
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
      809 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::BLc6yxms7m2rRgBq',
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
      832 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::eje8Jl7JKyguLa0p',
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
      855 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Ce5JBcBfWLAA54lQ',
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
      909 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::hEgf1Qd6z6eyOF6Y',
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
      952 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::fMSp7ZKbBbPSlDnK',
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
      967 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Puk737verk7Fjajf',
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
    'generated::yRZCZ7WsLAwmJjeL' => 
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
        'as' => 'generated::yRZCZ7WsLAwmJjeL',
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
    'generated::WeGQMsJvDfSPFELZ' => 
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
        'as' => 'generated::WeGQMsJvDfSPFELZ',
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
    'generated::sNAFDpajkEspUUTE' => 
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
        'as' => 'generated::sNAFDpajkEspUUTE',
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
    'generated::cyabgN0fSXqGbMrR' => 
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
        'as' => 'generated::cyabgN0fSXqGbMrR',
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
    'generated::ZGwksILRLHnQmc9F' => 
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
        'as' => 'generated::ZGwksILRLHnQmc9F',
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
    'generated::Fr0gVXU4iKCE4BPX' => 
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
        'as' => 'generated::Fr0gVXU4iKCE4BPX',
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
    'generated::0rQxjdOBriCSG9L4' => 
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
        'as' => 'generated::0rQxjdOBriCSG9L4',
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
    'generated::3XVk2ZdxKyM7X3eW' => 
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
        'as' => 'generated::3XVk2ZdxKyM7X3eW',
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
    'generated::pV9NukSzTLqzqgRA' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::pV9NukSzTLqzqgRA',
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
    'generated::AA4h0vKClP8eTAxX' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::AA4h0vKClP8eTAxX',
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
    'generated::bRbScNtjmNL4xdwH' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@edit',
        'controller' => 'App\\Http\\Controllers\\MDPController@edit',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::bRbScNtjmNL4xdwH',
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
    'generated::Ow4xU9OXzVobLU0a' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Ow4xU9OXzVobLU0a',
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
    'generated::fwYVKjWhdCG9t8pM' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::fwYVKjWhdCG9t8pM',
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
    'generated::NhslNkRTn93wxrhd' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@search',
        'controller' => 'App\\Http\\Controllers\\MDPController@search',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::NhslNkRTn93wxrhd',
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
    'generated::v7geZclOov0jfobu' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::v7geZclOov0jfobu',
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
    'generated::i10UB88KiNsur2Nh' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/approved-mdp',
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::i10UB88KiNsur2Nh',
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
    'generated::jaALHzMh5cR8jD3w' => 
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
        'as' => 'generated::jaALHzMh5cR8jD3w',
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
    'generated::kUtarBPnLlkJeL8p' => 
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
        'as' => 'generated::kUtarBPnLlkJeL8p',
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
    'generated::o50IQlYCPV17ujIz' => 
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
        'as' => 'generated::o50IQlYCPV17ujIz',
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
    'generated::wDr5EqjBr52gyqL6' => 
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
          2 => 'throttle:10000,1',
        ),
        'uses' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'controller' => 'App\\Http\\Controllers\\MDPController@mdpExport',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::wDr5EqjBr52gyqL6',
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
    'generated::DNTiPmIbxl3dD2H9' => 
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
        'as' => 'generated::DNTiPmIbxl3dD2H9',
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
    'generated::zVqAC3dtVDq30MgV' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::zVqAC3dtVDq30MgV',
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
    'generated::Q3FZb7UGfsEaIP4f' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::Q3FZb7UGfsEaIP4f',
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
    'generated::FIBAFG2JvRCZVzu8' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::FIBAFG2JvRCZVzu8',
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
    'generated::SRUd6CLLBXufhXd4' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::SRUd6CLLBXufhXd4',
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
    'generated::3WOXC0pgN11AQTdi' => 
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
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::3WOXC0pgN11AQTdi',
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
    'generated::ueFbmk2ZJDKbrFwu' => 
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
        'as' => 'generated::ueFbmk2ZJDKbrFwu',
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
    'generated::ssckqJavoNSEg9yw' => 
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
        'as' => 'generated::ssckqJavoNSEg9yw',
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
    'generated::WMrVsotUs1bEtPLB' => 
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
        'as' => 'generated::WMrVsotUs1bEtPLB',
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
    'generated::CjbCSPx0RNDkL5Cy' => 
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
        'as' => 'generated::CjbCSPx0RNDkL5Cy',
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
    'generated::bUlHEOWeeLAPPtGR' => 
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
        'as' => 'generated::bUlHEOWeeLAPPtGR',
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
    'generated::yfnvCcLKpT14oYmr' => 
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
        'as' => 'generated::yfnvCcLKpT14oYmr',
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
    'generated::mBW7cmcPtgaXlldG' => 
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
        'as' => 'generated::mBW7cmcPtgaXlldG',
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
    'generated::G9rzSkuxoEqs2MvB' => 
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
        'as' => 'generated::G9rzSkuxoEqs2MvB',
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
    'generated::mHM9ozMT7pgjxghY' => 
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
        'as' => 'generated::mHM9ozMT7pgjxghY',
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
    'generated::GvYEpFHpiFeywHFO' => 
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
        'as' => 'generated::GvYEpFHpiFeywHFO',
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
    'generated::eDe0XZaBzU7lAFZD' => 
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
        'as' => 'generated::eDe0XZaBzU7lAFZD',
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
    'generated::FK6yAzs0K2i5IAye' => 
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
        'as' => 'generated::FK6yAzs0K2i5IAye',
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
    'generated::hjvLOkLSBNmHeEiY' => 
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
        'as' => 'generated::hjvLOkLSBNmHeEiY',
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
    'generated::VPL9iumqKIpKUSiX' => 
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
        'as' => 'generated::VPL9iumqKIpKUSiX',
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
    'generated::echDN3XOIrVqXSAz' => 
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
        'as' => 'generated::echDN3XOIrVqXSAz',
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
    'generated::5SJuxL8o0Hu51ECp' => 
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
        'as' => 'generated::5SJuxL8o0Hu51ECp',
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
    'generated::4TnT792Kh9RndAmc' => 
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
        'as' => 'generated::4TnT792Kh9RndAmc',
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
    'generated::5IlXRQYSfPwmrzS8' => 
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
        'as' => 'generated::5IlXRQYSfPwmrzS8',
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
    'generated::FbBOTfzlYbch6Zi3' => 
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
        'as' => 'generated::FbBOTfzlYbch6Zi3',
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
    'generated::k9KD3NHgmTXdxBlR' => 
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
        'as' => 'generated::k9KD3NHgmTXdxBlR',
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
    'generated::OffD9XS6TSYuWzs4' => 
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
        'as' => 'generated::OffD9XS6TSYuWzs4',
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
    'generated::ax1lqcMfdmEA2abp' => 
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
        'as' => 'generated::ax1lqcMfdmEA2abp',
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
    'generated::bLf7jy63sH70G7Yj' => 
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
        'as' => 'generated::bLf7jy63sH70G7Yj',
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
    'generated::t5GXw0qAMz6UUM3i' => 
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
        'as' => 'generated::t5GXw0qAMz6UUM3i',
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
    'generated::DXEePLM9wjBMkHjv' => 
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
        'as' => 'generated::DXEePLM9wjBMkHjv',
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
    'generated::Daq2LbguDIY7tNi1' => 
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
        'as' => 'generated::Daq2LbguDIY7tNi1',
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
    'generated::mXrFRff8NkqK4Ow6' => 
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
        'as' => 'generated::mXrFRff8NkqK4Ow6',
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
    'generated::efJnAVXzZXsqpLA0' => 
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
        'as' => 'generated::efJnAVXzZXsqpLA0',
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
    'generated::AsadmzGNABy7BWmI' => 
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
        'as' => 'generated::AsadmzGNABy7BWmI',
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
    'generated::tWrutR0Fy3YNA4Eu' => 
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
        'as' => 'generated::tWrutR0Fy3YNA4Eu',
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
    'generated::KjxBhJaieeun4REd' => 
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
        'as' => 'generated::KjxBhJaieeun4REd',
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
    'generated::Jb3e2PTwqBGwAUN9' => 
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
        'as' => 'generated::Jb3e2PTwqBGwAUN9',
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
    'generated::YtXCwxYBwceg54tT' => 
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
        'as' => 'generated::YtXCwxYBwceg54tT',
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
    'generated::kulPE0BMmtYugaKs' => 
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
        'as' => 'generated::kulPE0BMmtYugaKs',
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
    'generated::BLc6yxms7m2rRgBq' => 
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
        'as' => 'generated::BLc6yxms7m2rRgBq',
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
    'generated::eje8Jl7JKyguLa0p' => 
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
        'as' => 'generated::eje8Jl7JKyguLa0p',
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
    'generated::Ce5JBcBfWLAA54lQ' => 
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
        'as' => 'generated::Ce5JBcBfWLAA54lQ',
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
    'generated::FrCvwwd2cbbmHheT' => 
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
        'as' => 'generated::FrCvwwd2cbbmHheT',
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
    'generated::1xvLnSahHTa7qKk0' => 
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
        'as' => 'generated::1xvLnSahHTa7qKk0',
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
    'generated::rMHhdaI7oTt5mGZa' => 
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
        'as' => 'generated::rMHhdaI7oTt5mGZa',
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
    'generated::l0EhZDUc4bLt9cWX' => 
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
        'as' => 'generated::l0EhZDUc4bLt9cWX',
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
    'generated::53h4aCO1fYe5iLYV' => 
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
        'as' => 'generated::53h4aCO1fYe5iLYV',
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
    'generated::XjrEFoPyMmIzK2im' => 
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
        'as' => 'generated::XjrEFoPyMmIzK2im',
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
    'generated::7UxbeWdH3P3Knepb' => 
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
        'as' => 'generated::7UxbeWdH3P3Knepb',
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
    'generated::UIzhPbdoJNiZsPmx' => 
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
        'as' => 'generated::UIzhPbdoJNiZsPmx',
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
    'generated::4d0MjyKECJbRDKkO' => 
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
        'as' => 'generated::4d0MjyKECJbRDKkO',
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
    'generated::vX8s6R7S7X2hMdEv' => 
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
        'as' => 'generated::vX8s6R7S7X2hMdEv',
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
    'generated::gwh7vZbUmPu3NXW4' => 
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
        'as' => 'generated::gwh7vZbUmPu3NXW4',
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
    'generated::PmuA6A3AkGLngmWF' => 
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
        'as' => 'generated::PmuA6A3AkGLngmWF',
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
    'generated::u9kBYHrpIXVY7mmb' => 
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
        'as' => 'generated::u9kBYHrpIXVY7mmb',
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
    'generated::mbPOasRK0dfxDacU' => 
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
        'as' => 'generated::mbPOasRK0dfxDacU',
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
    'generated::hEgf1Qd6z6eyOF6Y' => 
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
        'as' => 'generated::hEgf1Qd6z6eyOF6Y',
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
    'generated::9HNWo0rXbBMAemA2' => 
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
        'as' => 'generated::9HNWo0rXbBMAemA2',
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
    'generated::flP4FMudp06pzwJQ' => 
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
        'as' => 'generated::flP4FMudp06pzwJQ',
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
    'generated::fMSp7ZKbBbPSlDnK' => 
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
        'as' => 'generated::fMSp7ZKbBbPSlDnK',
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
    'generated::JQMws1tRk1vCiuC3' => 
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
        'as' => 'generated::JQMws1tRk1vCiuC3',
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
    'generated::ae3kc3fyi9VDIHMt' => 
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
        'as' => 'generated::ae3kc3fyi9VDIHMt',
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
    'generated::U2VyDhylbX5nIYuS' => 
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
        'as' => 'generated::U2VyDhylbX5nIYuS',
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
    'generated::Puk737verk7Fjajf' => 
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
        'as' => 'generated::Puk737verk7Fjajf',
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
