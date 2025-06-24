import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../views/auth/Login.vue'
import Main from '../components/layouts/Main'
import Dashboard from '../views/dashboard/Index.vue'
import MDPList from '../views/mdp/MDPList'
import MDPCreate from '../views/mdp/Create'
import MDPEdit from '../views/mdp/Create.vue'
import AllMDPPrint from '../views/mdp/AllMdpPrint.vue'
import AllMDPPrintTwo from '../views/mdp/AllPrintTwo.vue'
import MDPPrint from '../views/mdp/Print'
import MDPPrintTwo from '../views/mdp/PrintTwo'
import TrainingFeedback from '../views/mdp/TrainingFeedback'
import TrainingFeedback2nd from '../views/mdp/TrainingFeedback2nd'
import AdditionalTraining from '../views/mdp/AdditionalTraining'
import TopRankedTraining from '../views/mdp/TopRankedTraining'
import TopTrainingPrint from '../views/mdp/TopTrainingPrint'
import EmployeeIndividualTraining from '../views/mdp/EmployeeIndividualTraining'
import employeeWiseReport from '../views/mdp/employeeWiseReport'
import SEPAutomation from '../views/sep/SEPList.vue'
import SEPPortfolio from '../views/sep/SEPPortfolio.vue'
import SEPDepartment from '../views/sep/SEPDepartment.vue'
import SEPDesignation from '../views/sep/SEPDesignation.vue'
import RecruitmentRequisition from '../views/recruitment_requisition/Index.vue'

//import TopTrainingPrint from '../views/mdp/TopTrainingPrint'
import TaxCertificate from '../views/tax/TaxCertificate'
import TaxReturnAcknowledgement from '../views/Tax/TRA.vue'
import TaxReturnAcknowledgementReport from '../views/Tax/TRAReport.vue'
import SubmitStatus from '../views/tax/TRAEmp.vue'

import IdeaSubmissionForm from '../views/ideaHub/IdeaSubmissionForm.vue'
import IdeaHub from '../views/ideaHub/IdeaList.vue'
import IdeaHubDetails from '../views/ideaHub/IdeaDetails.vue'

//user
import UserList from '../views/users/Index'

//ACTION PLAN
import ActionPlanList from '../views/action_plan/ActionPlanList'
import ActionPlanCreate from '../views/action_plan/Create'
import ActionPlanEdit from '../views/action_plan/Edit'
import ActionPlanPrint from '../views/action_plan/Print'

//job Description
import JobDescriptionList from '../views/job_description/JobDescriptionList'
import JobDescriptionCreate from '../views/job_description/Create'
import JobDescriptionEdit from '../views/job_description/Edit'
import JobDescriptionPrint from '../views/job_description/Print'

import MDPChartReport from '../views/chart/MDPChartReport'
import MDPOrganizedPendingPTCReport from '../views/chart/MDPOrganizedPendingPTCReport'
import MDPOrganizedPendingPTCReportDetails from '../views/chart/MDPOrganizedPendingPTCReportDetails'
import MDPOrganizedPendingPTCTitleWiseEmployee from '../views/chart/MDPOrganizedPendingPTCTitleWiseEmployee'
//Learning Transfer
import MDPPeriodWiseTraining from '../views/chart/learning_transfer/LearningTransferList.vue'
import LearningTransferDetails from '../views/chart/learning_transfer/LearningTransferDetails.vue'

import MDPPeriodWiseFeedback from '../views/chart/training_feedback/LearningTransferList.vue'
import FeedbackDetails from '../views/chart/training_feedback/FeedbackDetails.vue'

//report
import PendingPTCReport from '../views/report/PendingPTCReport.vue'
import ApprovedPTCReport from '../views/report/ApprovedPTCReport.vue'
import TotalReport from '../views/report/TotalReport.vue'

import NotFound from '../views/404/Index';
import {baseurl} from '../base_url'

Vue.use(VueRouter);

const config = () => {
    let token = localStorage.getItem('token');
    return {
        headers: {Authorization: `Bearer ${token}`}
    };
}
const checkToken = (to, from, next) => {
    let token = localStorage.getItem('token');
    if (token === undefined || token === null || token === '') {
        next(baseurl + 'login');
    } else {
        next();
    }
};

const activeToken = (to, from, next) => {
    let token = localStorage.getItem('token');
    if (token === undefined || token === null || token === '') {
        next();
    } else {
        next(baseurl);
    }
};

const routes = [
    {
        path: baseurl,
        component: Main,
        redirect: {name: 'Dashboard'},
        children: [
            //DASHBAORD
            {path: baseurl + 'dashboard', name: 'Dashboard', component: Dashboard},
            {path: baseurl + 'user-list', name: 'UserList', component: UserList},
            //mdp list
            {path: baseurl + 'mdp-list', name: 'MDPList', component: MDPList},
            {path: baseurl + 'mdp-create', name: 'MDPCreate', component: MDPCreate},
            {path: baseurl + 'mdp-edit/:ID', name: 'MDPEdit', component: MDPEdit},
            {path: baseurl + 'all-mdp-print', name: 'AllMDPPrint', component: AllMDPPrint},
            {path: baseurl + 'mdp-print/:ID', name: 'MDPPrint', component: MDPPrint},
            {path: baseurl + 'all-mdp-print_two/:ID', name: 'AllMDPPrintTwo', component: AllMDPPrintTwo},
            {path: baseurl + 'mdp-print_two/:ID', name: 'MDPPrintTwo', component: MDPPrintTwo},
            {path: baseurl + 'mdp-training-feedback', name: 'TrainingFeedback', component: TrainingFeedback},
            {path: baseurl + 'mdp-training-feedback-2nd', name: 'TrainingFeedback2nd', component: TrainingFeedback2nd},
            {path: baseurl + 'add-additional-training', name: 'AdditionalTraining', component: AdditionalTraining},
            {path: baseurl + 'top-ranked-training', name: 'TopRankedTraining', component: TopRankedTraining},
            {path: baseurl + 'top-ranked-training-print', name: 'TopTrainingPrint', component: TopTrainingPrint},
            {path: baseurl + 'employee-individual-training', name: 'EmployeeIndividualTraining', component: EmployeeIndividualTraining},
            {path: baseurl + 'employee-wise-report', name: 'employeeWiseReport', component: employeeWiseReport},

            //Action Plan list
            {path: baseurl + 'action-plan-list', name: 'ActionPlanList', component: ActionPlanList},
            {path: baseurl + 'action-plan-create', name: 'ActionPlanCreate', component: ActionPlanCreate},
            {path: baseurl + 'action-plan-edit/:ID', name: 'ActionPlanEdit', component: ActionPlanEdit},
            {path: baseurl + 'action-plan-print/:ID', name: 'ActionPlanPrint', component: ActionPlanPrint},
            //SEP Automation List
             {path: baseurl + 'sep-automation-list', name: 'SEPAutomation', component: SEPAutomation},
             {path: baseurl + 'sep-portfolio-list', name: 'SEPPortfolio', component: SEPPortfolio},
             {path: baseurl + 'sep-department-list', name: 'SEPDepartment', component: SEPDepartment},
             {path: baseurl + 'sep-designation-list', name: 'SEPDesignation', component: SEPDesignation},

            //job Description list
            {path: baseurl + 'job-description-list', name: 'JobDescriptionList', component: JobDescriptionList},
            {path: baseurl + 'job-description-create', name: 'JobDescriptionCreate', component: JobDescriptionCreate},
            {path: baseurl + 'job-description-edit/:ID', name: 'JobDescriptionEdit', component: JobDescriptionEdit},
            {path: baseurl + 'job-description-print/:ID', name: 'JobDescriptionPrint', component: JobDescriptionPrint},
            {path: baseurl + 'mdp-chart-report', name: 'MDPChartReport', component: MDPChartReport},
            {path: baseurl + 'mdp-organized-pending-ptc/:Period', name: 'MDPOrganizedPendingPTCReport', component: MDPOrganizedPendingPTCReport},
            {path: baseurl + 'mdp-organized-pending-ptc-details/:Period/:Status', name: 'MDPOrganizedPendingPTCReportDetails', component: MDPOrganizedPendingPTCReportDetails},
            {path: baseurl + 'mdp-organized-pending-ptc-title-wise-employee/:Title/:Period/:Status', name: 'MDPOrganizedPendingPTCTitleWiseEmployee', component: MDPOrganizedPendingPTCTitleWiseEmployee},
            //Learning Transfer
            {path: baseurl + 'mdp-period-wise-training/:Period', name: 'MDPPeriodWiseTraining', component: MDPPeriodWiseTraining},
            {path: baseurl + 'mdp-period-wise-training/learning-transfer-details/:Period/:TrainingTitle', name: 'LearningTransferDetails', component: LearningTransferDetails},
            //feedback
            {path: baseurl + 'mdp-period-wise-feedback/:Period', name: 'MDPPeriodWiseFeedback', component: MDPPeriodWiseFeedback},
            {path: baseurl + 'mdp-period-wise-feedback/feedback-details/:Period/:TrainingTitle', name: 'FeedbackDetails', component: FeedbackDetails},
            //report PendingPTCReport
            {path: baseurl + 'pending-PTC-report', name: 'PendingPTCReport', component: PendingPTCReport},
            {path: baseurl + 'approved-PTC-report', name: 'ApprovedPTCReport', component: ApprovedPTCReport},
            {path: baseurl + 'total-report', name: 'TotalReport', component: TotalReport},
            //tax TaxCertificate
            {path: baseurl + 'tax-certificate', name: 'TaxCertificate', component: TaxCertificate},
            {path: baseurl + 'tax-return-acknowledgement', name: 'TaxReturnAcknowledgement', component: TaxReturnAcknowledgement},
            {path: baseurl + 'tax-return-acknowledgement-report', name: 'TaxReturnAcknowledgementReport', component: TaxReturnAcknowledgementReport},
            {path: baseurl + 'tax-return-submit/:Year/:Dept/:Status', name: 'SubmitStatus', component: SubmitStatus},

            //idea hub
            {path: baseurl + 'idea-submission', name: 'IdeaSubmissionForm', component: IdeaSubmissionForm},
            {path: baseurl + 'idea-hub', name: 'IdeaHub', component: IdeaHub},
            {path: baseurl + 'idea-hub-details/:IdeaID', name: 'IdeaHubDetails', component: IdeaHubDetails}

        ],
        beforeEnter(to, from, next) {
            checkToken(to, from, next);
        }
    },
    {
        path: baseurl + 'login',
        name: 'Login',
        component: Login,
        beforeEnter(to, from, next) {
            activeToken(to, from, next);
        }
    },
    //Recruitment Requisition 
    {
        path: baseurl + 'recruitment-requisition',
        name: 'RecruitmentRequisition',
        component: RecruitmentRequisition,
        beforeEnter(to, from, next) {
            activeToken(to, from, next);
        }
    },
    {
        path: baseurl + '*',
        name: 'NotFound',
        component: NotFound,
    },
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.baseurl,
    routes
});

router.afterEach(() => {
    $('#preloader').hide();
});

export default router
