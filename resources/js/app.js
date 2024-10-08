
require('./bootstrap');
require('./validation/index');

import Vue from 'vue'
import App from './views/App'
import router from './router/index';
import store from './store/index'
import {baseurl} from './base_url'

//import v-form
import { Form } from 'vform'
window.Form = Form;

// main origin
Vue.prototype.mainOrigin = baseurl

import Toaster from 'v-toaster'
import 'v-toaster/dist/v-toaster.css'
Vue.use(Toaster, {timeout: 5000})

//Vue Multiselect
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

//Vue Datepicker
import { Datepicker } from '@livelybone/vue-datepicker';
Vue.component('datepicker', Datepicker);
import '@livelybone/vue-datepicker/lib/css/index.css'

//import sweetalert
import Swal from 'sweetalert2';
window.Swal = Swal;

//pre loader
import loader from "vue-ui-preloader";
Vue.use(loader);


//moment
import moment from 'moment'

//Print This
window.printThis = require('print-this');

//html2canvas
import VueHtml2Canvas from 'vue-html2canvas';
Vue.use(VueHtml2Canvas);

Vue.prototype.moment = moment
export const bus = new Vue();

Vue.component('skeleton-loader', require('./components/loaders/Straight').default);
Vue.component('submit-form', require('./components/buttons/Submit').default);
Vue.component('submit-form-2', require('./components/buttons/Submit2').default);
Vue.component('datatable', require('./components/datatable/Index').default);
Vue.component('advanced-datatable', require('./components/datatable/Advanced').default);
Vue.component('advanced-datatable-new', require('./components/datatable/AdvancedNew').default);
Vue.component('data-export', require('./components/datatable/Export').default);
Vue.component('breadcrumb', require('./components/layouts/Breadcrumb').default);
Vue.component('barchart', require('./components/chart/Bar').default);

//custom pagination component
Vue.component('pagination', require('./components/partial/PaginationComponent.vue').default);
Vue.component('report-pagination', require('./components/partial/ReportPaginationComponent.vue').default);

const app = new Vue({
    el: '#app',
    store: store,
    components: {App},
    router,
});
