<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Create Management Development Plan']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <router-link :to="{name: 'MDPList'}" class="btn btn-primary btn-sm">
                <i class="fas fa-backward"></i>
                Back
              </router-link>
              <button type="button" class="btn btn-primary btn-sm" @click="reload">
                <i class="fas fa-sync"></i>
                Reload
              </button>
            </div>
          </div>
        </div>
      </breadcrumb>
      <div class="row">
        <div class="col-xl-12">

            <div class="row">

              <div class="col-md-7">
                <form @submit.prevent="store()" @keydown="form.onKeydown($event)" v-on:change="saveFormDataState()">
                <div class="card">
                  <div class="datatable" v-if="!isLoading">
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label>Appraisal Period</label>
                                <input type="text" name="AppraisalPeriod" readonly v-model="form.AppraisalPeriod" class="form-control" :class="{ 'is-invalid': form.errors.has('AppraisalPeriod') }" required>
                                <div class="error" v-if="form.errors.has('AppraisalPeriod')" v-html="form.errors.get('AppraisalPeriod')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label>Staff ID</label>
                                <input type="text" name="StaffID" id="StaffID" v-model="form.StaffID"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('StaffID') }" @change="getEmployeeByStaffID" required>
                                <div class="error" v-if="form.errors.has('StaffID')" v-html="form.errors.get('StaffID')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Employee Name</label>
                              <input type="text" name="EmployeeName" v-model="form.EmployeeName" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('EmployeeName') }" required>
                              <div class="error" v-if="form.errors.has('EmployeeName')" v-html="form.errors.get('EmployeeName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="Designation" readonly v-model="form.Designation" class="form-control" :class="{ 'is-invalid': form.errors.has('Designation') }" required>
                              <div class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" name="Department" readonly v-model="form.Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }" required>
                              <div class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Business</label>
                              <input type="text" name="Business" readonly v-model="form.Business" class="form-control" :class="{ 'is-invalid': form.errors.has('Business') }" required>
                              <div class="error" v-if="form.errors.has('Business')" v-html="form.errors.get('Business')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Official Email</label>
                              <input type="email" name="OfficialEmail" readonly v-model="form.OfficialEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('OfficialEmail') }" required>
                              <small v-if="form.OfficialEmail && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.OfficialEmail)" class="text-danger">
                                Invalid email format.
                              </small>
                              <div class="error" v-if="form.errors.has('OfficialEmail')" v-html="form.errors.get('OfficialEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mobile</label>
                              <input type="text" name="Mobile" v-model="form.Mobile" class="form-control" :class="{ 'is-invalid': form.errors.has('Mobile') }"   maxlength="11"
                                     pattern="01[0-9]{9}" required>
                              <small v-if="form.Mobile && !/^01[0-9]{9}$/.test(form.Mobile)" class="text-danger">
                                Invalid mobile number. Must start with 01 and be 11 digits long.
                              </small>
                              <div class="error" v-if="form.errors.has('Mobile')" v-html="form.errors.get('Mobile')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Date Of Birth</label>
                              <input type="text" name="DateOfBirth" v-model="form.DateOfBirth" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('DateOfBirth') }" required>
                              <div class="error" v-if="form.errors.has('DateOfBirth')" v-html="form.errors.get('DateOfBirth')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Joining Date</label>
<!--                              <datepicker v-model="form.JoiningDate" :format="customFormatter" readonly placeholder="Enter Date" input-class="form-control"></datepicker>-->
                              <input type="text" name="JoiningDate" v-model="form.JoiningDate" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('JoiningDate') }" required>
                              <div class="error" v-if="form.errors.has('JoiningDate')" v-html="form.errors.get('JoiningDate')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Current Position</label>
                              <input type="text" name="CurrentPosition" v-model="form.CurrentPosition" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('CurrentPosition') }" required>
                              <div class="error" v-if="form.errors.has('CurrentPosition')" v-html="form.errors.get('CurrentPosition')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Present Job Started On</label>
                              <datepicker v-model="form.PresentJobStartedOn" :format="customFormatter" input-class="form-control" required></datepicker>
<!--                              <input type="text" name="PresentJobStartedOn" v-model="form.PresentJobStartedOn" class="form-control" :class="{ 'is-invalid': form.errors.has('PresentJobStartedOn') }">-->
                              <div class="error" v-if="form.errors.has('PresentJobStartedOn')" v-html="form.errors.get('PresentJobStartedOn')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Qualification</label>
                              <input type="text" name="Qualification" readonly v-model="form.Qualification" class="form-control" :class="{ 'is-invalid': form.errors.has('Qualification') }" required>
                              <div class="error" v-if="form.errors.has('Qualification')" v-html="form.errors.get('Qualification')" />
                            </div>
                          </div>
                          <div class="col-md-4" >
                            <div class="form-group">
                              <label>Signature(<span style="font-size: 10px;color: blue">Image dimensions must be 200x60 pixels.</span>)</label>
                              <input @change="changeImage($event)" type="file" name="Signature" class="form-control" :class="{ 'is-invalid': form.errors.has('Signature') }" required>
                              <div class="error" v-if="form.errors.has('Signature')" v-html="form.errors.get('Signature')"/>
                              <img v-if="form.Signature" :src="showImage(form.Signature)" alt="" height="60px" width="200px">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <a href="https://imageresizer.com/" target="_blank" style="margin-top: 32px;display: block;font-weight: bold;">Suggestive Link for Signature Resize</a>
                          </div>
                        </div>
                        <hr>
                       </div>

                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Staff ID</label>
                              <input type="text" name="SuppervisorStaffID" v-model="form.SuppervisorStaffID" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorStaffID') }" @change="getSupervisorByStaffID" required>
                              <div class="error" v-if="form.errors.has('SuppervisorStaffID')" v-html="form.errors.get('SuppervisorStaffID')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Name</label>
                              <input type="text" name="SuppervisorName" readonly v-model="form.SuppervisorName" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorName') }" required>
                              <div class="error" v-if="form.errors.has('SuppervisorName')" v-html="form.errors.get('SuppervisorName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Designation</label>
                              <input type="text" name="SuppervisorDesignation" readonly v-model="form.SuppervisorDesignation" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorDesignation') }" required>
                              <div class="error" v-if="form.errors.has('SuppervisorDesignation')" v-html="form.errors.get('SuppervisorDesignation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Email</label>
                              <input type="text" name="SuppervisorEmail" readonly v-model="form.SuppervisorEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorEmail') }" required>
                              <div class="error" v-if="form.errors.has('SuppervisorEmail')" v-html="form.errors.get('SuppervisorEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Mobile</label>
                              <input type="text" name="SuppervisorMobile" readonly v-model="form.SuppervisorMobile" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorMobile') }" required>
                              <div class="error" v-if="form.errors.has('SuppervisorMobile')" v-html="form.errors.get('SuppervisorMobile')" />
                            </div>
                          </div>
                        </div>
                        <hr>
                        <p style="font-size: 13px;font-weight:bold;color:#0000B9">A. To improve the performance of your present job, list below the areas where you feel that you require additional knowledge or better understanding.
                          Which you will acquire at your personal initiative:</p>
                        <hr>
                        <h4 style="font-size: 18px">Personal Initiative</h4>
                        <div class="row" v-for="(initiat, index) in form.initiative" :key="index">
                          <div class="col-4 col-md-4">
                            <div class="form-group">
                              <label>Training Title</label>
                              <input v-model="initiat.Name" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" name="amount" placeholder="Title"  maxlength="90"    @input="countSpace(initiat.Name,'personal','personal',index)"  required>
                              <small v-if="errors.PersonalIN && errors.PersonalIN[index]" class="error">
                                {{ errors.PersonalIN[index].Name }}
                              </small>
                              <div class="error" v-if="form.errors.has('Name')" v-html="form.errors.get('Name')" />
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Competency Type</label>
                              <select v-model="initiat.Type" name="Type" id="catId" class="form-control" :class="{ 'is-invalid': form.errors.has('Type') }" required>
                                <option value="">Select Type</option>
                                <option value="Behavior">Behavior</option>
                                <option value="Knowledge">Knowledge</option>
                                <option value="Skill">Skill</option>

<!--                                <option :value="category.id" v-for="(category,index) in categories" :key="index">{{category.name}}</option>-->
                              </select>
                              <div class="error" v-if="form.errors.has('Type')" v-html="form.errors.get('Type')" />
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Planned Date</label>
                              <datepicker v-model="initiat.Date" :format="customFormatter" placeholder="Enter Date" input-class="form-control" required></datepicker>
                              <div class="error" v-if="form.errors.has('Date')" v-html="form.errors.get('Date')" />
                            </div>
                          </div>
                          <div class="col-2" style="padding-top: 30px">
                            <button type="button" class="btn btn-danger btn-sm" v-show="index!==0" @click="deleteFind(index)">x</button>&nbsp;
                            <button type="button" class="btn btn-success btn-sm" @click="addFind">+</button>
                          </div>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary float-right" @click="getSuggestiveList()" v-if="dropDown==='NO'" style="width: 230px;height: 45px">Suggestive List</button>
                        <h4 style="font-size: 18px">Required Training</h4>
                        <p style="font-size: 13px">Which will require in-house or external training that you think should be organized by the Company.</p>
                        <hr>
                        <div class="row" v-for="(train,index2) in form.training" v-if="dropDown">

                          <div class="col-6 col-md-6" v-if="dropDown==='YES'">
                            <div class="form-group">
                              <label>Select Training Title</label>
                              <select v-model="train.TrainingTitle" name="Type" id="TrainingTitle" class="form-control" :class="{ 'is-invalid': form.errors.has('TrainingTitle') }" required>
                                <option value="">Select Type</option>
                                <option :value="list.TrainingTitle" v-for="(list,i) in training_list" :key="i">{{list.TrainingTitle}}</option>
                              </select>
                              <div class="error" v-if="form.errors.has('TrainingTitle')" v-html="form.errors.get('TrainingTitle')" />
                            </div>
                          </div>

                          <div class="col-4 col-md-4" v-else>
                            <div class="form-group">
                              <label>Select Training Title</label>
                              <input v-model="train.TrainingTitle" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('Name') }" name="TrainingTitle" placeholder="Type Or Copy From Suggestive List" required>
                              <div class="error" v-if="form.errors.has('TrainingTitle')" v-html="form.errors.get('TrainingTitle')" />
                            </div>
                          </div>

                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Competency Type</label>
                              <select v-model="train.TrainingType" name="TrainingType" id="TrainingType" class="form-control" :class="{ 'is-invalid': form.errors.has('TrainingType') }" required>
                                <option value="">Select Type</option>
                                <option value="Behavior">Behavior</option>
                                <option value="Knowledge">Knowledge</option>
                                <option value="Skill">Skill</option>

                              </select>
                              <div class="error" v-if="form.errors.has('TrainingType')" v-html="form.errors.get('TrainingType')" />
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Planned Date</label>
                              <datepicker v-model="train.TrainingDate" :format="customFormatter" placeholder="Enter Date" input-class="form-control" required></datepicker>
                              <div class="error" v-if="form.errors.has('TrainingDate')" v-html="form.errors.get('TrainingDate')" />
                            </div>
                          </div>
<!--                          <div class="col-2" style="padding-top: 30px">-->
<!--                            <button type="button" class="btn btn-danger btn-sm" @click="Training_deleteFind(index2)">x</button>&nbsp;-->
<!--                            <button type="button" class="btn btn-success btn-sm" @click="Training_addFind">+</button>-->
<!--                          </div>-->
                        </div>

                        <hr>

                        <div class="row">
                          <p style="font-size: 13px;font-weight: bold;color:#0000B9"> B. For development to take future responsibilities
                            Other than those mentioned in A, list below two areas of personal development/training that you would like to see
                            happen in your case in the coming years and explain how those trainings will help the company
                          </p>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-6 col-md-6">
                                <div class="form-group">
                                  <label>Future Training One</label>
                                  <input v-model="form.AreaOne" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('AreaOne') }"
                                         @input="countSpace(form.AreaOne,'AreaOne','area')"   name="Title" placeholder="Title"  required>
                                  <small v-if="errors.AreaOne" class="error">{{ errors.AreaOne }}</small>
                                  <div class="error" v-if="form.errors.has('AreaOne')" v-html="form.errors.get('AreaOne')" />

                                  <br>
                                  <small>Explain how this training one will help the company.</small>
                                  <input v-model="form.FutureTrainingOneDetails" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('FutureTrainingOneDetails') }"
                                         style="height: 90px" name="Reason" placeholder="Max 30 words" @input="countSpace(form.FutureTrainingOneDetails,'futureTrainingOne','future')"  required>
                                  <div class="error" v-if="form.errors.has('FutureTrainingOneDetails')" v-html="form.errors.get('FutureTrainingOneDetails')" />
                                  <small v-if="errors.FutureTrainingOneDetails" class="error">{{ errors.FutureTrainingOneDetails }}</small>
                                  <div class="error" v-if="form.errors.has('FutureTrainingOneDetails')" v-html="form.errors.get('FutureTrainingOneDetails')" />

                                </div>
                              </div>
                              <div class="col-6 col-md-6">
                                <div class="form-group">
                                  <label>Future Training Two</label>
                                  <input v-model="form.AreaTwo" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('AreaTwo') }"
                                         @input="countSpace(form.AreaTwo,'AreaTwo','area')"   name="Title" placeholder="Title"  required>
                                  <small v-if="errors.AreaTwo" class="error">{{ errors.AreaTwo }}</small>
                                  <div class="error" v-if="form.errors.has('AreaTwo')" v-html="form.errors.get('AreaTwo')" />


                                  <br>
                                  <small>Explain how this training one will help the company.</small>
                                  <input v-model="form.FutureTrainingTwoDetails" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('FutureTrainingTwoDetails') }"
                                         style="height: 90px" name="Reason" placeholder="Max 30 words" @input="countSpace(form.FutureTrainingTwoDetails,'futureTrainingTwo','future')" required>
                                  <div class="error" v-if="form.errors.has('FutureTrainingTwoDetails')" v-html="form.errors.get('FutureTrainingTwoDetails')" />
                                  <small v-if="errors.FutureTrainingTwoDetails" class="error">{{ errors.FutureTrainingTwoDetails }}</small>
                                  <div class="error" v-if="form.errors.has('FutureTrainingTwoDetails')" v-html="form.errors.get('FutureTrainingTwoDetails')" />

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
<!--                            <button  class="btn btn-secondary" @click="clearFormDataState">Clear Data</button>-->

                          </div>
                        </div>
                      </div>
                  </div>
                </div>
                </form>
              </div>

              <div class="col-md-5">
                <div class="card">
                  <div class="datatable" v-if="!isLoading">
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="row">
                          <div class="col-md-9" style="color: #0f6674"><p>Last Five Years Training History</p> </div>
                          <div class="col-md-3">
                            <button class="btn btn-info btn-sm" @click="downloadTraining"> <i class="fas fa-download"></i> Download</button>
                          </div>
                        </div>

                        <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
                          <thead>
                            <tr>
<!--                              <th>Organized By</th>-->
<!--                              <th>Training Category</th>-->
<!--                              <th>Training Name</th>  -->
                              <th>SN</th>
                              <th>Training Title</th>
                              <th>Training Type</th>
                              <th>Competency Type</th>
                              <th style="width: 70px">Done Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(training, i) in training_history" :key="i" v-if="training_history.length">
<!--                                <td>{{ training.Organized_By }}</td>-->
<!--                                <td>{{ training.Tranning_Category }}</td>-->
<!--                                <td>{{ training.Tranning_Name }}</td>   -->

                                <td>{{ ++i }}</td>
                                <td>{{ training.TrainingTitle }}</td>
                                <td>{{ training.TrainingType }}</td>
                                <td>{{ training.CompetencyType }}</td>
                                <td>{{ training.DoneDate }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>
<!--    modal-->

    <div class="modal fade bs-example-modal-lg" id="suggestiveModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title mt-0" id="myLargeModalLabel">Suggestive Learning Offering List</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" @click="modalHide()">×</button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered table-striped dt-responsive nowrap dataTable no-footer dtr-inline table-sm small">
              <thead>
              <tr>
                <th>Learning Topic</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(suggestive, i) in suggestive_list" :key="i" v-if="suggestive_list.length">
                <td>{{ suggestive.TrainingTitle }}</td>
              </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <data-export/>
    <div>
      <loader v-if="PreLoader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    </div>
<!--    <div id="app">-->
<!--      <cropper-->
<!--          class="cropper" -->
<!--          :src="form.Signature"-->
<!--          :stencil-props="{  aspectRatio: 200/60  }"-->
<!--          @change="change"-->
<!--      ></cropper>-->
<!--    </div>-->
  </div>
</template>

<script>
import {baseurl} from '../../base_url'
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
import {Common} from "../../mixins/common";
import { VueEditor } from "vue2-editor";
import {bus} from "../../app";
import * as events from "events";
const DATA_LIFETIME = 72 * 60 * 60 * 1000;
//------------ for image crop-----------------

import Vue from 'vue'
import { Cropper } from 'vue-advanced-cropper'
import 'vue-advanced-cropper/dist/style.css';

export default {
  name: "List",
  computed: {
    events() {
      return events
    }
  },
  mixins: [Common],
  components: {
    Datepicker,
    VueEditor,
    Cropper
  },
  data() {
    return {
      imageUrl: null,
      cropper: null,
      training_history: [],
      training_list: [],
      employee: [],
      supervisor: [],
      suggestive_list: [],
      form: new Form({
        ID :'',
        AppraisalPeriod :'',
        StaffID :'',
        EmployeeName :'',
        Designation :'',
        Department: '',
        Business: '',
        OfficialEmail:'',
        Mobile:'',
        DateOfBirth:'',
        JoiningDate:'',
        CurrentPosition:'',
        PresentJobStartedOn:'',
        Qualification:'',
        Signature: '',
        SuppervisorStaffID:'',
        SuppervisorName:'',
        SuppervisorDesignation:'',
        SuppervisorEmail:'',
        SuppervisorMobile:'',
        AreaOne:'',
        FutureTrainingOneDetails:'',
        AreaTwo:'',
        FutureTrainingTwoDetails:'',
        initiative: [{ Name: '' , Type: '', Date: ''}],
        training: [
            { TrainingTitle: '' , TrainingType: '', TrainingDate: ''},
            { TrainingTitle: '' , TrainingType: '', TrainingDate: ''},
            { TrainingTitle: '' , TrainingType: '', TrainingDate: ''},
            { TrainingTitle: '' , TrainingType: '', TrainingDate: ''},
            { TrainingTitle: '' , TrainingType: '', TrainingDate: ''},
        ],
        TrainingOne: '',
        TrainingTwo: '',
      }),
      isLoading: false,
      dropDown:'',
      errorMessage: '',
      imageDimensions: '',
      PreLoader: false,
      errors: {
        FutureTrainingOneDetails: '',
        FutureTrainingTwoDetails: '',
        AreaOne:'',
        AreaTwo:'',
        PersonalIN:{},
      }
    }
  },
  mounted() {
    document.title = 'MDP Create | MDP';
    //this.getAllEmployeeTrainingList()
  },
  created() {
    this.getUserData()
    this.initFormDataState();
    //this.getData()
  },
  methods: {
    getEmployeeByStaffID(){
      axios.post(baseurl +'api/get-employee-by-employee-code/', {
        EmpCode: this.form.StaffID,
      }).then((response)=>{
        // console.log(response)
        this.training_history = response.data.training_history;
        this.form.EmployeeName = response.data.employee.EmployeeName;
        this.form.Designation = response.data.employee.Designation;
        this.form.Department = response.data.employee.Department;
        this.form.Business = response.data.employee.Business;
        this.form.OfficialEmail = response.data.employee.OfficialEmail;
        // this.form.Mobile = response.data.employee.Mobile;
        this.form.DateOfBirth = response.data.employee.DateOfBirth;
        this.form.JoiningDate = response.data.employee.JoiningDate;
        this.form.CurrentPosition = response.data.employee.CurrentPosition;
        this.form.PresentJobStartedOn = response.data.employee.PresentJobStartedOn;
        this.form.Qualification = response.data.employee.Qualification;
        this.form.StaffID = response.data.employee.StaffID;
        this.dropDown = response.data.dropDown;
        this.training_list = response.data.training_list;
        this.form.AppraisalPeriod = response.data.period;
      }).catch((error)=>{

      })
    },
    countSpace(val, type, module, index) {
      try {
        const wordCount = val.trim().split(/\s+/).length;

        if (module === 'future') {
          if (wordCount > 30) {
            if (type === 'futureTrainingOne') {
              this.errors.FutureTrainingOneDetails = 'Max word limit 30!';
              this.errorNoti(this.errors.FutureTrainingOneDetails);
            } else if (type === 'futureTrainingTwo') {
              this.errors.FutureTrainingTwoDetails = 'Max word limit 30!';
              this.errorNoti(this.errors.FutureTrainingTwoDetails);
            }
          } else {
            this.errors.FutureTrainingOneDetails = '';
            this.errors.FutureTrainingTwoDetails = '';
          }
        } else {
          if (wordCount > 10) {
            if (type === 'personal') {
              if (!this.errors.PersonalIN || typeof this.errors.PersonalIN !== 'object') {
                this.errors.PersonalIN = {};
              }
              this.errors.PersonalIN[index].Name = 'Max word limit 10!';
              this.errorNoti(this.errors.PersonalIN[index].Name);
            } else if (type === 'AreaOne') {
              this.errors.AreaOne = 'Max word limit 10!';
              this.errorNoti(this.errors.AreaOne);
            } else if (type === 'AreaTwo') {
              this.errors.AreaTwo = 'Max word limit 10!';
              this.errorNoti(this.errors.AreaTwo);
            }
          } else {
            // Clear errors safely
            if (type === 'personal' && this.errors.PersonalIN && typeof this.errors.PersonalIN === 'object') {
              this.errors.PersonalIN[index].Name = '';
            }
            if (type === 'AreaOne') this.errors.AreaOne = '';
            if (type === 'AreaTwo') this.errors.AreaTwo = '';
          }
        }

      } catch (error) {
        console.error("Max word limit crossed", error);
      }
    },

    store() {
      // Correct word count logic
      const oneWordCount = this.form.FutureTrainingOneDetails.trim().split(/\s+/).filter(Boolean).length;
      const twoWordCount = this.form.FutureTrainingTwoDetails.trim().split(/\s+/).filter(Boolean).length;
      const AreaTwoCount = this.form.AreaTwo.trim().split(/\s+/).filter(Boolean).length;
      const AreaOneCount = this.form.AreaOne.trim().split(/\s+/).filter(Boolean).length;

      // Reset errors
      this.errors = {};

      if (!this.errors.PersonalIN || typeof this.errors.PersonalIN !== 'object') {
        this.errors.PersonalIN = {};
      }
      this.form.initiative.forEach((item, index) => {
        if (!this.errors.PersonalIN[index]) {
          this.errors.PersonalIN[index] = {};
        }

        console.log(this.errors.PersonalIN[index])
        const nameWords = item.Name?.trim().split(/\s+/).filter(Boolean).length || 0;

        if (nameWords > 10) {
          console.log('length',this.errors.PersonalIN[index].length)
          this.errors.PersonalIN[index].Name = `Title must not exceed 10 words.`;
        }
        return;
      });


      // Validate
      if (oneWordCount > 30 || twoWordCount > 30 || AreaOneCount > 10 || AreaTwoCount > 10) {
        if (oneWordCount > 30) {
          this.errors.FutureTrainingOneDetails = `Future Training One must not exceed 30 words. Currently: ${oneWordCount}`;
        }
        if (twoWordCount > 30) {
          this.errors.FutureTrainingTwoDetails = `Future Training Two must not exceed 30 words. Currently: ${twoWordCount}`;
        }
        if (AreaOneCount > 30) {
          this.errors.AreaOne = `Title One must not exceed 10 words. Currently: ${AreaOneCount}`;
        }
        if (AreaTwoCount > 30) {
          this.errors.AreaTwo = `Title Two must not exceed 10 words. Currently: ${AreaTwoCount}`;
        }

        return; // Stop form submission
      }else{

        this.form.busy = true;
        this.PreLoader = true;

        this.form.post(baseurl + "api/mdp/store").then(response => {
          if (response.data.status === 'error') {
            this.errorNoti(response.data.message);
          } else {
            this.redirect(this.mainOrigin + 'mdp-list');
            this.successNoti(response.data.message);
            this.clearFormDataState();
          }
          this.PreLoader = false;
        }).catch(e => {
          this.isLoading = false;
          this.PreLoader = false;
        });
      }

    },


    change({coordinates, canvas}) {
      console.log(coordinates, canvas)
    },

    //keep data in the localstorage as cache till 72h
    initFormDataState() {
      try {
        if (typeof localStorage !== 'undefined') {
          const storedData = localStorage.getItem('formData');
          if (storedData) {
            const { formData, timestamp } = JSON.parse(storedData);

            // Check if the data is still valid (within the lifetime of 72 hours)
            if (Date.now() - timestamp < DATA_LIFETIME) {
              this.prevForm = new Form(formData); // Initialize the form with the stored data
              this.form.fill(this.prevForm)

            } else {
              // Clear the outdated data from localStorage
              localStorage.removeItem('formData');
            }
          }
        }
      } catch (error) {
        console.error("Error parsing form data from localStorage:", error);
      }
    },

    // Function to save the form data state to localStorage
    saveFormDataState() {
      try {
        if (typeof localStorage !== 'undefined') {
          const formData = JSON.stringify({
            formData: this.form, // Save the form data
            timestamp: Date.now(), // Save the current timestamp
          });
          localStorage.setItem('formData', formData); // Store in localStorage
        }
      } catch (error) {
        console.error("Error saving form data to localStorage:", error);
      }
    },
    clearFormDataState() {
      try {
        if (typeof localStorage !== 'undefined') {
          localStorage.removeItem('formData'); // Remove the form data from localStorage
          this.form = new Form({}); // Reset the form to its initial state
        }
      } catch (error) {
        console.error("Error clearing form data from localStorage:", error);
      }
    },
    downloadTraining(){
      axios.get(baseurl +'api/get-export-training-history?empcode='+ this.form.StaffID).then((response)=>{
        let dataSets = response.data.training_history;
        if (dataSets.length > 0) {
          let columns = Object.keys(dataSets[0]);
          columns = columns.filter((item) => item !== 'row_num');
          let rex = /([A-Z])([A-Z])([a-z])|([a-z])([A-Z])/g;
          columns = columns.map((item) => {
            let title = item.replace(rex, '$1$4 $2$3$5')
            return {title, key: item}
          });
          //this.generateExport(dataSets, columns, 'Job Card Report')
          bus.$emit('data-table-import', dataSets, columns, 'Last Five Years Training History')
        }
      }).catch((error)=>{
        console.log(response)
      })
    },

    getSupervisorByStaffID(){
      axios.post(baseurl +'api/get-supervisor-by-employee-code/', {
        EmpCode: this.form.StaffID,
        SuperVisorEmpCode: this.form.SuppervisorStaffID,
      }).then((response)=>{
        // console.log(response)
        if (response.data.status === 'error'){
          this.errorNoti(response.data.message);
        }else {
          this.form.SuppervisorName = response.data.employee.SuppervisorName;
          this.form.SuppervisorDesignation = response.data.employee.SuppervisorDesignation;
          this.form.SuppervisorEmail = response.data.employee.SuppervisorEmail;
          this.form.SuppervisorMobile = response.data.employee.SuppervisorMobile;
          this.form.SuppervisorStaffID = response.data.employee.SuppervisorStaffID;
        }
      }).catch((error)=>{

      })
    },
    getAllEmployeeTrainingList(){
      axios.get(baseurl+'api/get-all-employee-training-list').then((response)=>{
        this.training_list = response.data.training_list;
      }).catch((error)=>{

      })
    },
    getSuggestiveList(){
      axios.get(baseurl+'api/get-level-wise-suggestive-list/' + this.form.StaffID).then((response)=>{
        this.suggestive_list = response.data.suggestive_list;
        $("#suggestiveModal").modal("show");
      }).catch((error)=>{

      })
    },
    getData() {
      axios.get(baseurl+'api/get-agree-business-user').then((response)=>{
        this.dropDown = response.data.dropDown
      }).catch((error)=>{

      })
    },
    getUserData() {
      this.axiosPost('me', {}, (response) => {
        this.image = `${this.mainOrigin}assets/images/avatar.png`;
        this.$store.commit('me', response);
        if(response.payload.Type ==='employee'){
          this.form.StaffID = response.payload.EmpCode;
          this.getEmployeeByStaffID()
          $('#StaffID').attr('readonly', true);
        }
      }, (error) => {
        this.errorNoti(error);
      });
    },
    modalHide(){
      $("#suggestiveModal").modal("hide");
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    //for initiative
    addFind: function () {
      if (this.form.initiative.length < 5) {
        console.log(this.form.initiative.length + 1);
        this.form.initiative.push({ Name: '', Type: '', Date: '' });
      } else {
        this.errorNoti('No more than 5 training entries can be added!');
      }
    },

    deleteFind: function (index) {
      this.form.initiative.splice(index, 1);
    },
    //for training
    Training_addFind: function () {
      this.form.training.push({ TrainingTitle: '' , TrainingType: '', TrainingDate: ''});
    },
    Training_deleteFind: function (index2) {
      this.form.training.splice(index2, 1);
    },
    reload(){
      this.clearFormDataState()
      window.location.reload();
    },
    changeImage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      reader.onload = event => {
        this.form.Signature = event.target.result;
      };
      reader.readAsDataURL(file);
    },
    showImage() {
      let img = this.form.Signature;
      if (img.length > 100) {
        return this.form.Signature;
      } else {
        return window.location.origin + "/signature/" + this.form.Signature;
      }
    },
  },
}
</script>
<style scoped>
.cropper {
  height: 600px;
  background: #DDD;
}
.side_note label{
  font-size: 11px!important;
  margin-bottom: 0;
}
.side_note .form-control {
  height: 25px!important;
}
.side_note .form-group {
  margin-bottom: 0;
}
.form-group label{
  font-size:12px!important
}
.form-control {
  font-size: 12px!important;
}
</style>
