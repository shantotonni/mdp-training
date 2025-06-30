<template>
  <div class="content">
    <div class="container-fluid">
      <breadcrumb :options="['Create Management Development Plan']">
        <div class="col-sm-6">
          <div class="float-right d-none d-md-block">
            <div class="card-tools">
              <router-link :to="{name: 'MDPList'}" class="btn btn-primary btn-sm">
                <i class="fas fa-backward"></i>
                Back MDP List
              </router-link>
              <button type="button" class="btn btn-primary btn-sm" @click="reload">
                <i class="fas fa-sync"></i>
                Reload
              </button>
            </div>
          </div>
        </div>
      </breadcrumb>
      <div class="row" v-if="isFullPageLoading">
        <div class="col-xl-12" v-if="this.Type!='admin' && cardShow">
          <div class="row" v-if="!moduleStatus">
            <div class="col-md-12">
              <div class="card">
                <div class="datatable">
                  <div class="card-body">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-12 d-flex justify-content-center"  v-if="EligibleInfo==='notEligible'">
                          <div class="w-100 mt-5 p-4 bg-light border border-danger rounded shadow text-center" style="max-width: 600px;">
                            <h2 class="mb-3 fw-bold text-primary">
                              Welcome to the MDP Training Form {{ form.AppraisalPeriod}}
                            </h2>
                            <div>
                              <p class="text-secondary mb-3">
                                We're sorry — you're <strong class="text-danger">not eligible</strong> to fill out this form.
                              </p>
                              <p class="text-muted mb-4">
                                Please contact the <strong>Learning & Development</strong> team for further assistance.
                              </p>
                              <button
                                  @click="downloadInfo"
                                  class="btn btn-primary"
                              >
                                📥 Download Info
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center"  v-else-if="EligibleInfo==='alreadySubmitted'">
                          <div class="w-100 mt-5 p-4 bg-light border border-success rounded shadow text-center" style="max-width: 600px;">
                            <h2 class="mb-3 fw-bold text-primary">
                              <p >Welcome to the MDP Training Form {{ form.AppraisalPeriod}}</p>
                            </h2>
                            <h5 class="mb-3 fw-bold text-primary">
                              <p class="text-success">You have already submitted the MDP for this Year.</p>
                              <p class="text-success">Thank You!</p>
                            </h5>
                          </div>
                        </div>
                        <div class="col-md-12 d-flex justify-content-center"  v-else>
                          <div class="w-100 mt-5 p-4 bg-light border border-warning rounded shadow text-center" style="max-width: 600px;">
                            <h2 class="mb-3 fw-bold text-primary">
                              <p >Welcome to the MDP Training Form {{ form.AppraisalPeriod}}</p>
                            </h2>
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12" v-else>
          <div class="row" >
            <div class="col-md-8">
              <!--                   @submit.prevent="store()" @keydown="form.onKeydown($event)" v-on:change="saveFormDataState()" -->
              <form @submit.prevent="store()">
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
                                <small class="error" v-if="form.errors.has('AppraisalPeriod')" v-html="form.errors.get('AppraisalPeriod')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <div class="form-group">
                                <label>Staff ID</label>
                                <input type="text" name="StaffID" id="StaffID" v-model="form.StaffID"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('StaffID') }" :readonly="idActive" @change="getEmployeeByStaffID" required>
                                <small class="error" v-if="form.errors.has('StaffID')" v-html="form.errors.get('StaffID')" />
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Employee Name</label>
                              <input type="text" name="EmployeeName" v-model="form.EmployeeName" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('EmployeeName') }" required>
                              <small class="error" v-if="form.errors.has('EmployeeName')" v-html="form.errors.get('EmployeeName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" name="Designation" readonly v-model="form.Designation" class="form-control" :class="{ 'is-invalid': form.errors.has('Designation') }" required>
                              <small class="error" v-if="form.errors.has('Designation')" v-html="form.errors.get('Designation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Department</label>
                              <input type="text" name="Department" readonly v-model="form.Department" class="form-control" :class="{ 'is-invalid': form.errors.has('Department') }" required>
                              <small class="error" v-if="form.errors.has('Department')" v-html="form.errors.get('Department')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Business</label>
                              <input type="text" name="Business" readonly v-model="form.Business" class="form-control" :class="{ 'is-invalid': form.errors.has('Business') }" required>
                              <small class="error" v-if="form.errors.has('Business')" v-html="form.errors.get('Business')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Official Email</label>
                              <input type="email" name="OfficialEmail" v-model="form.OfficialEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('OfficialEmail') }" required>
                              <small v-if="form.OfficialEmail && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.OfficialEmail)" class="text-danger">
                                Invalid email format.
                              </small>
                              <small class="error" v-if="form.errors.has('OfficialEmail')" v-html="form.errors.get('OfficialEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Mobile</label>
                              <input type="text" name="Mobile" v-model="form.Mobile" class="form-control" :class="{ 'is-invalid': form.errors.has('Mobile') }" maxlength="11"
                                     pattern="01[0-9]{9}" required>
                              <small v-if="form.Mobile && !/^01[0-9]{9}$/.test(form.Mobile)" class="text-danger">
                                Invalid mobile number. Must start with 01 and be 11 digits long.
                              </small>
                              <small class="error" v-if="form.errors.has('Mobile')" v-html="form.errors.get('Mobile')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Date Of Birth</label>
                              <input type="text" name="DateOfBirth" v-model="form.DateOfBirth" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('DateOfBirth') }" required>
                              <small class="error" v-if="form.errors.has('DateOfBirth')" v-html="form.errors.get('DateOfBirth')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Joining Date</label>
                              <input type="text" name="JoiningDate" v-model="form.JoiningDate" readonly class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('JoiningDate') }" required>
                              <small class="error" v-if="form.errors.has('JoiningDate')" v-html="form.errors.get('JoiningDate')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Current Position</label>
                              <input type="text" name="CurrentPosition" v-model="form.CurrentPosition" readonly class="form-control" :class="{ 'is-invalid': form.errors.has('CurrentPosition') }" required>
                              <small class="error" v-if="form.errors.has('CurrentPosition')" v-html="form.errors.get('CurrentPosition')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Present Job Started On</label>
                              <input type="text" name="PresentJobStartedOn" v-model="form.PresentJobStartedOn" readonly class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('PresentJobStartedOn') }" required>
                              <small class="error" v-if="form.errors.has('PresentJobStartedOn')" v-html="form.errors.get('PresentJobStartedOn')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Qualification</label>
                              <input type="text" name="Qualification" readonly v-model="form.Qualification" class="form-control" :class="{ 'is-invalid': form.errors.has('Qualification') }" required>
                              <small class="error" v-if="form.errors.has('Qualification')" v-html="form.errors.get('Qualification')" />
                            </div>
                          </div>
                          <!--signature-->
                          <div class="col-md-4" v-if="!moduleStatus">
                            <div class="form-group">
                              <label>Signature</label>
                              <!-- Trigger -->
                              <input type="file" @change="onFileChange"  ref="fileInput" accept="image/*" :disabled="previewUrl" required/>

                            </div>
                          </div>
                          <div class="col-md-4" >
                            <div class="form-group">
                              <div v-if="previewUrl">
                                <label>Preview:</label> <span>
                                    <button type="button" class="btn btn-danger btn-sm" @click="resetCropper">x</button>&nbsp;
                                  </span>
                                <img :src="previewUrl" style="width: 200px; height: 60px;" />
                              </div>
                            </div>
                          </div>
                        </div>
                        <hr>
                      </div>
                      <!--supervisor and training-->
                      <div class="col-md-12">
                        <div class="row">
                          <!--supervisor-->
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Type your Supervisor Staff ID, then press Enter</label>
                              <input type="text" name="SuppervisorStaffID" v-model="form.SuppervisorStaffID" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorStaffID') }"  @change="getSupervisorByStaffID" required>
                              <small class="error" v-if="form.errors.has('SuppervisorStaffID')" v-html="form.errors.get('SuppervisorStaffID')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Name</label>
                              <input type="text" name="SuppervisorName" readonly v-model="form.SuppervisorName" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorName') }" required>
                              <small class="error" v-if="form.errors.has('SuppervisorName')" v-html="form.errors.get('SuppervisorName')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Designation</label>
                              <input type="text" name="SuppervisorDesignation" readonly v-model="form.SuppervisorDesignation" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorDesignation') }" required>
                              <small class="error" v-if="form.errors.has('SuppervisorDesignation')" v-html="form.errors.get('SuppervisorDesignation')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Email</label>
                              <input type="text" name="SuppervisorEmail" readonly v-model="form.SuppervisorEmail" class="form-control" :class="{ 'is-invalid': form.errors.has('SuppervisorEmail') }" required>
                              <small class="error" v-if="form.errors.has('SuppervisorEmail')" v-html="form.errors.get('SuppervisorEmail')" />
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Supervisor Mobile</label>
                              <input type="text" name="SuppervisorMobile" readonly v-model="form.SuppervisorMobile" class="form-control"
                                     :class="{ 'is-invalid': form.errors.has('SuppervisorMobile') }" required>
                              <small class="error" v-if="form.errors.has('SuppervisorMobile')" v-html="form.errors.get('SuppervisorMobile')" />
                            </div>
                          </div>
                        </div>
                        <hr>
                        <!--training-->
                        <p style="font-size: 13px;font-weight:bold;color:#0000B9">A. To improve the performance of your present job, list below the areas where you feel that you require additional knowledge or better understanding.
                          Which you will acquire at your personal initiative:</p>
                        <hr>
                        <!--Personal-->
                        <h4 style="font-size: 18px">Personal Initiative</h4>

                        <div class="row" v-for="(initiat, index) in form.initiative" :key="index" v-if="form.initiative && form.initiative.length > 0">
                          <div class="col-5 col-md-5">
                            <div class="form-group">
                              <label>Training Title</label>
                              <input style="font-size: 12px !important;" v-model="initiat.Name"
                                     type="text" class="form-control"
                                     name="amount" placeholder="Title"
                              >
                              <small v-if="errors.PersonalIN?.[index]?.Name" class="error">
                                {{ errors.PersonalIN[index].Name }}
                              </small>
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Competency Type</label>
                              <select v-model="initiat.Type" name="Type" id="catId" class="form-control">
                                <option value="">Select Type</option>
                                <option value="Behavior">Behavior</option>
                                <option value="Knowledge">Knowledge</option>
                                <option value="Skill">Skill</option>
                              </select>
                              <small v-if="errors.PersonalIN?.[index]?.Type" class="error">
                                {{ errors.PersonalIN[index].Type }}
                              </small>
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Planned Date</label>
                              <datepicker
                                  v-model="initiat.Date"
                                  format="dd-MM-yyyy"
                                  :disabled-dates="disabledDates"
                                  placeholder="Enter Date"
                                  input-class="form-control"
                              ></datepicker>
                              <small v-if="errors.PersonalIN?.[index]?.Date" class="error">
                                {{ errors.PersonalIN[index].Date }}
                              </small>
                            </div>
                          </div>
                          <div class="col-1" style="padding-top: 30px">
                            <button type="button" class="btn btn-danger btn-sm" style="font-size: 7.6px!important;" v-show="index!==0" @click="deleteFind(index)">x</button>&nbsp;
                            <button type="button" class="btn btn-success btn-sm" style="font-size: 7.6px!important;" @click="addFind">+</button>
                          </div>
                        </div>
                        <hr>
                        <button type="button" class="btn btn-primary float-right" @click="getSuggestiveList()" v-if="dropDown==='NO'" style="width: 230px;height: 45px">Suggestive List</button>
                        <!--Required-->
                        <h4 style="font-size: 18px">Required Training</h4>
                        <p style="font-size: 13px">Which will require in-house or external training that you think should be organized by the Company.</p>
                        <hr>
                        <div class="row" v-for="(train,index2) in form.training">
                          <!--v-if="dropDown==='YES'"-->
                          <div class="col-5 col-md-5" >
                            <div class="form-group">
                              <label v-if="newTrainingList">Select Training Title</label>
                              <multiselect
                                  v-if="newTrainingList"
                                  v-model="train.selectedTraining"
                                  :options="newTrainingList"
                                  :multiple="false"
                                  :searchable="true"
                                  :close-on-select="true"
                                  :show-labels="true"
                                  :taggable="true"
                                  label="TrainingTitle"
                                  track-by="TrainingCode"
                                  placeholder="Select Training"
                                  @change="validateRequiredTraining"
                                  @tag="Level==='TOP' ? addCustomTraining($event, train) : null"
                                  @input="onTrainingSelected($event, train)"
                              ></multiselect>

                              <small v-if="errors.RequiredIN?.[index2]?.TrainingTitle" class="error">
                                {{ errors.RequiredIN[index2].TrainingTitle }}
                              </small>
                            </div>
                          </div>

                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Competency Type</label>
                              <select v-model="train.TrainingType" :disabled="train.selectedTraining" name="TrainingType" id="TrainingType" class="form-control">
                                <option value="">Select Type</option>
                                <option value="Behavior">Behavior</option>
                                <option value="Knowledge">Knowledge</option>
                                <option value="Skill">Skill</option>
                              </select>
                              <small v-if="errors.RequiredIN?.[index2]?.TrainingType" class="error">
                                {{ errors.RequiredIN[index2].TrainingType }}
                              </small>
                            </div>
                          </div>
                          <div class="col-3 col-md-3">
                            <div class="form-group">
                              <label>Planned Date</label>
                              <datepicker
                                  v-model="train.TrainingDate"
                                  format="dd-MM-yyyy"
                                  :disabled-dates="disabledDates"
                                  placeholder="Enter Date"
                                  input-class="form-control"
                                  @change="validateRequiredTraining"
                              ></datepicker>
                              <small v-if="errors.RequiredIN?.[index2]?.TrainingDate" class="error">
                                {{ errors.RequiredIN[index2].TrainingDate }}
                              </small>
                            </div>
                          </div>
                          <div class="col-1" style="padding-top: 30px">
                            <button type="button" class="btn btn-danger btn-sm" style="font-size: 7.6px!important;" @click="Training_deleteFind(index2)" v-show="index2>2 && index2<5" >x</button>&nbsp;
                            <button type="button" class="btn btn-success btn-sm" style="font-size: 7.6px!important;" @click="Training_addFind">+</button>
                          </div>
                        </div>

                        <hr>
                        <!--future-->
                        <div class="row">
                          <p style="font-size: 13px;font-weight: bold;color:#0000B9"> B. For development to take future responsibilities
                            Other than those mentioned in A, list below two areas of personal development/training that you would like to see
                            happen in your case in the coming years and explain how those trainings will help the company
                          </p>
                          <div class="col-md-12">
                            <div class="row">
                              <div class="col-6 col-md-6">
                                <div class="form-group">
                                  <label>Future Training 1</label>
                                  <multiselect
                                      v-if="newTrainingList"
                                      v-model="form.AreaOne"
                                      :options="newTrainingList"
                                      :multiple="false"
                                      :searchable="true"
                                      :close-on-select="true"
                                      :show-labels="true"
                                      :taggable="true"
                                      label="TrainingTitle"
                                      track-by="TrainingCode"
                                      placeholder="Select or Type Training"
                                      @tag="Level==='TOP'? addCustomTrainingA($event,'AreaOne' ):null"
                                      >
                                  </multiselect>
                                  <small v-if="errors.AreaOne" class="error">{{ errors.AreaOne }}</small>
                                  <small class="error" v-if="form.errors.has('AreaOne')" v-html="form.errors.get('AreaOne')" />

                                  <br>
                                  <small>Explain how this training 1 will help the company.</small>
                                  <input v-model="form.FutureTrainingOneDetails"
                                         type="text" class="form-control"
                                         :class="{ 'is-invalid': form.errors.has('FutureTrainingOneDetails') }"
                                         style="height: 90px;font-size: 12px !important;"
                                         name="Reason" placeholder="Max 30 words"
                                         @input="validateWordLimit('FutureTrainingOneDetails', 30)"
                                  >
                                  <small class="error" v-if="form.errors.has('FutureTrainingOneDetails')" v-html="form.errors.get('FutureTrainingOneDetails')" />
                                  <small v-if="errors.FutureTrainingOneDetails" class="error">{{ errors.FutureTrainingOneDetails }}</small>
                                </div>
                              </div>
                              <div class="col-6 col-md-6">
                                <div class="form-group">
                                  <label>Future Training 2</label>
                                  <multiselect
                                      v-if="newTrainingList"
                                      v-model="form.AreaTwo"
                                      :options="newTrainingList"
                                      :multiple="false"
                                      :searchable="true"
                                      :close-on-select="true"
                                      :show-labels="true"
                                      :taggable="true"
                                      label="TrainingTitle"
                                      track-by="TrainingCode"
                                      placeholder="Select or Type Training"
                                      @tag="Level==='TOP'? addCustomTrainingA($event,'AreaTwo' ):null"
                                  ></multiselect>
                                  <small v-if="errors.AreaTwo" class="error">{{ errors.AreaTwo }}</small>
                                  <small class="error" v-if="form.errors.has('AreaTwo')" v-html="form.errors.get('AreaTwo')" />

                                  <br>
                                  <small>Explain how this training 2 will help the company.</small>
                                  <input v-model="form.FutureTrainingTwoDetails"
                                         type="text" class="form-control"
                                         :class="{ 'is-invalid': form.errors.has('FutureTrainingTwoDetails') }"
                                         style="height: 90px ;font-size: 12px !important;"
                                         name="Reason" placeholder="Max 30 words"
                                         @input="validateWordLimit('FutureTrainingTwoDetails', 30)"
                                  >
                                  <small class="error" v-if="form.errors.has('FutureTrainingTwoDetails')" v-html="form.errors.get('FutureTrainingTwoDetails')" />
                                  <small v-if="errors.FutureTrainingTwoDetails" class="error">{{ errors.FutureTrainingTwoDetails }}</small>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- submit-->
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary" :disabled="isSubmitting">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!--five years training-->
            <div class="col-md-4">
              <div class="card">
                <div class="datatable" v-if="!isLoading">
                  <div class="card-body">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-md-9" style="color: #0f6674"><p>Last Five Years Training History</p> </div>
                        <div class="col-md-3 text-right">
                          <button class="btn btn-info btn-sm " @click="downloadTraining"> <i class="fas fa-download"></i> Download</button>
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
      <div class="row" v-else>
        <div class="col-xl-12">
          <div class="skeleton-loader">
            <div class="skeleton-line w-2"></div>
            <div class="skeleton-line w-full"></div>
            <div class="skeleton-line w-4"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- signature Modal -->
    <div class="modal fade" id="cropperModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="height: 90vh; display: flex; flex-direction: column;">

          <!-- Modal Header -->
          <div class="modal-header">
            <h5 class="modal-title">Crop Image</h5>
            <button type="button" class="close" data-dismiss="modal" @click="resetCropper">
              <span>&times;</span>
            </button>
          </div>

          <!-- Modal Body (Flex Grow) -->
          <div class="modal-body p-0" style="flex: 1; display: flex; flex-direction: column; overflow: hidden;">
            <div v-if="imageUrl" style="flex: 1; position: relative;">
              <cropper
                  ref="cropper"
                  :src="imageUrl"
                  :aspect-ratio="10 / 3"
                  :auto-crop-area="1"
                  :view-mode="1"
                  :min-crop-box-width="200"
                  :min-crop-box-height="60"
                  style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;" required
              />
            </div>
          </div>
          <div class="error" v-if="form.errors.has('Signature')" v-html="form.errors.get('Signature')"/>
          <!--Modal Footer -->
          <div class="modal-footer">
            <button class="btn btn-secondary btn-sm" data-dismiss="modal" @click="resetCropper">Cancel</button>
            <button class="btn btn-info btn-sm" @click="prepareCrop">Crop</button>
          </div>

        </div>
      </div>
    </div>
    <div>
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

    </div>
    <data-export/>
    <div>
      <loader v-if="PreLoader" object="#ff9633" color1="#ffffff" color2="#17fd3d" size="5" speed="2" bg="#343a40" objectbg="#999793" opacity="80" name="circular"></loader>
    </div>
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

import 'vue-advanced-cropper/dist/style.css';

import Cropper from 'vue-cropperjs'
import 'cropperjs/dist/cropper.css'

export default {
  name: "List",
  computed: {
    events() {
      return events
    },
    disabledDates() {
      return {
        customPredictor: this.disableOutsideFiscalYear
      };
    }
  },
  mixins: [Common],
  components: {
    Datepicker,
    VueEditor,
    Cropper
  },
  data() {
    const today = new Date();
    const currentYear = today.getFullYear();
    const highestYear = currentYear + 1;
    return {

      minDate: moment().subtract(1, 'month').toDate(),
      maxDate: moment().add(1, 'month').toDate(),

      startDate: currentYear+'-07-01',
      endDate: highestYear+'-06-30',
      previewUrl: null,
      croppedBlob: null,
      imageUrl: null,
      cropper: null,
      newTrainingList: [],
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
        DeptCode: '',
        Business: '',
        OfficialEmail:'',
        Mobile:'',
        DateOfBirth:'',
        JoiningDate:'',
        CurrentPosition:'',
        PresentJobStartedOn:'',
        Qualification:'',
        Signature: null,
        SuppervisorStaffID:'',
        SuppervisorName:'',
        SuppervisorDesignation:'',
        SuppervisorEmail:'',
        SuppervisorMobile:'',
        AreaOne:'',
        FutureTrainingOneDetails:'',
        AreaTwo:'',
        FutureTrainingTwoDetails:'',
        initiative: [
          {Name: '' , Type: '', Date:  null }
        ],
        training: [
          { TrainingCode: '' ,TrainingTitle: '' , TrainingType: '', TrainingDate:  null, selectedTraining: null},
          { TrainingCode: '',TrainingTitle: '' , TrainingType: '', TrainingDate:  null, selectedTraining: null},
          { TrainingCode: '',TrainingTitle: '' , TrainingType: '', TrainingDate:  null, selectedTraining: null},
        ],
      }),
      isLoading: false,
      isFullPageLoading: false,
      dropDown:'',
      errorMessage: '',
      imageDimensions: '',
      Level: '',
      Type: '',

      EligibleInfo: '',
      EligibleInfoMessage: '',
      status: '',

      idActive: false,
      cardShow: false,
      moduleStatus: false,
      PreLoader: false,
      isSubmitting: false,
      errors: {
        FutureTrainingOneDetails: '',
        FutureTrainingTwoDetails: '',
        AreaOne:'',
        AreaTwo:'',
        PersonalIN:{},
        RequiredIN:{},
      },
      wordLimitError: false
    }
  },
  mounted() {
    document.title = 'MDP Create | MDP';
    $('#cropperModal').on('shown.bs.modal', () => {
      setTimeout(() => window.dispatchEvent(new Event('resize')), 100);
    });
    // this.resetCropper();
  },
  created() {
    this.loadFormData();
  },
  methods: {
    wordCount(text) {
      if (!text) return 0;
      return text.trim().split(/\s+/).filter(Boolean).length;
    },
    validateWordLimit(field, maxWords) {
      const wordTotal = this.wordCount(this.form[field]);
      const message = 'Maximum 30 words allowed.';
      if (wordTotal > maxWords) {
        this.form.errors.set(field, message);
        this.wordLimitError = true;
      } else {
        this.form.errors.clear(field);
        this.wordLimitError = false;
      }
    },
    disableOutsideFiscalYear(date) {
      const today = new Date();
      const year = today.getMonth() < 6 ? today.getFullYear() : today.getFullYear();

      const fiscalStart = new Date(year, 6, 1);  // July 1
      const fiscalEnd = new Date(year + 1, 5, 30); // June 30 next year

      // Normalize time to 00:00 for comparison
      date.setHours(0, 0, 0, 0);

      return date < fiscalStart || date > fiscalEnd;
    },
    async loadFormData() {
      this.PreLoader=true
      if (this.$route.params.ID) {
        try {
          // this.form.AppraisalPeriod = this.$route.params.YEAR;
          const response = await axios.get(baseurl + `api/mdp/edit/${this.$route.params.ID}/${this.$route.params.YEAR}`);
          const data = response.data.data;
          this.form.fill(data);
          this.isFullPageLoading=true

          this.SelectedAreaOne = data.AreaOne;
          this.SelectedAreaTwo = data.AreaTwo;
          this.form.training = data.training;
          this.moduleStatus = true;
          this.getTrainingHistory()
          // await this.getEmployeeByStaffID();
          await this.getNewTrainingList();
          // await this.setEditTrainingList();
        } catch (error) {
        }
      } else {
        this.getUserData();
        this.initFormDataState();
        await this.getEmployeeByStaffID();
        await this.getNewTrainingList();
      }
    },
    store() {
      alert('submit initial')
      this.errors = {};

      if (!this.errors.PersonalIN || typeof this.errors.PersonalIN !== 'object') {
        this.errors.PersonalIN = {};
      }

      const futureWordErrors = this.validateWordCountsFuture(); // returns true if error exists
      const initiativeErrors = this.validateInitiatives();
      const requiredErrors = this.validateRequiredTraining();
      const futureErrorsDuplicate = this.validateFutureTrainingDuplicate();
      const findDuplicateTitleError = this.findDuplicateTitle();
      const formFieldsValid = this.validateFormFields(); // true = valid

      if (futureWordErrors || initiativeErrors || requiredErrors || futureErrorsDuplicate || findDuplicateTitleError || !formFieldsValid) {
        alert('error')
        this.isSubmitting = false;
        this.PreLoader = false;
        return ;
      }else{
        alert('submit success')
        const formData = this.buildFormData();
        this.isSubmitting = true;
        this.PreLoader = true;

        let url = this.moduleStatus ? 'api/mdp/update' : 'api/mdp/store';

        axios.post(baseurl + url, formData, {
          headers: { 'Content-Type': 'multipart/form-data' },
        }).then(response => {
          if (response.data.status ==="error"){

            if (response.data.errors) {
              for (const field in response.data.errors) {
                this.form.errors.set(field, response.data.errors[field][0]);
              }
            } else {
              this.errorNoti(response.data.message);
            }
            this.PreLoader = false;
            this.isSubmitting = false;
          }else{
            this.successNoti(response.data.message);
            this.redirect(this.mainOrigin + 'mdp-list');
            this.clearFormDataState();
            this.PreLoader = false;
            this.isSubmitting = false;
          }
        }).catch(error => {
          this.errorNoti('Upload failed.');
          this.PreLoader = false;
          this.isSubmitting = false;
        });
      }
    },
    async getEmployeeByStaffID(){
      this.PreLoader=true
      axios.post(baseurl +'api/get-employee-by-employee-code/', {
        EmpCode: this.form.StaffID,
        Period: this.form.AppraisalPeriod,
      }).then((response)=>{
        this.isFullPageLoading = true
        this.status = response.data.status;
        if (response.data.status==='success'){
          if (this.Type==='admin'){
            this.cardShow=true;
            this.idActive=false;
            this.clearFormDataState();
          }else{
            this.cardShow=false;
            this.idActive=true;
          }
          this.form.EmployeeName = response.data.employee.EmployeeName;
          this.form.Designation = response.data.employee.Designation;
          this.form.Department = response.data.employee.Department;
          this.form.DeptCode = response.data.employee.DeptCode;
          this.form.Business = response.data.employee.Business;
          this.form.OfficialEmail = response.data.employee.OfficialEmail;
          this.form.DateOfBirth = response.data.employee.DateOfBirth;
          this.form.JoiningDate = response.data.employee.JoiningDate;
          this.form.CurrentPosition = response.data.employee.CurrentPosition;
          this.form.PresentJobStartedOn = response.data.employee.PresentJobStartedOn;
          this.form.Qualification = response.data.employee.Qualification;
          this.form.StaffID = response.data.employee.StaffID;
          this.dropDown = response.data.dropDown;
          this.training_list = response.data.training_list;
          this.getNewTrainingList();
          this.getTrainingHistory()
          this.Level = response.data.employee.Level;
        }else{
          this.EligibleInfo = response.data.data;
          this.EligibleInfoMessage = response.data.message;
          if (this.Type==='admin'){
            this.errorNoti(this.EligibleInfoMessage);
          }

          this.cardShow = true;
        }
        this.PreLoader = false

      }).catch((error)=>{

      })
    },
    async getNewTrainingList(){
      axios.get(baseurl+'api/get-new-training?StaffID='+this.form.StaffID
          +'&Period='+this.form.AppraisalPeriod
      ).then((response)=>{
        this.newTrainingList = response.data.data;
        if (this.moduleStatus){
          this.setEditTrainingList();
        }
        this.PreLoader = false;
      }).catch((error)=>{
        this.PreLoader = false;
      })
    },
    async setEditTrainingList(){
      this.form.AreaOne = this.newTrainingList.find(t => t.TrainingCode === this.SelectedAreaOne);
      this.form.AreaTwo = this.newTrainingList.find(t => t.TrainingCode === this.SelectedAreaTwo);
      this.form.training.forEach((item, index) => {
        const matched = this.newTrainingList.find(t => String(t.TrainingCode) === String(item.TrainingCode));
        if (matched) {
          item.selectedTraining = matched || {
            TrainingCode: item.TrainingCode,
            TrainingTitle: item.TrainingTitle,
            isDropDown: 'N'
          };
          // Set TrainingType (e.g., "Skill", "Behavior", etc.)
          item.TrainingType = item.TrainingType || matched?.CompetencyType || '';
          item.TrainingDate= item.TrainingDate
          // moment(item.TrainingDate).format('YYYY-MM-DD')
        } else {
          item.selectedTraining = null; // Or handle custom trainings
        }
      });
    },
    onTrainingSelected(selectedItem, train) {
      if (selectedItem && typeof selectedItem === 'object') {
        // When user selects from the list
        train.TrainingCode = selectedItem.TrainingCode || null;
        train.TrainingTitle = selectedItem.TrainingTitle || '';
        train.TrainingType = selectedItem.CompetencyType || null;
        train.selectedTraining = selectedItem; // Vue tracks this object
      } else if (typeof selectedItem === 'string') {
        // When user types a new one (tagged)
        train.TrainingCode = null;
        train.TrainingType = null;
        train.TrainingTitle = selectedItem;
        train.selectedTraining = {
          TrainingTitle: selectedItem, // create a minimal object for v-model to bind
          TrainingCode: null,
        };
      }
    },
    onTrainingCodePicked(selectedTraining, train) {

      if (selectedTraining && typeof selectedTraining === 'object') {
        train.TrainingType = selectedTraining.CompetencyType;
      } else {
        train.TrainingType = '';
      }
    },
    addCustomTraining(newTitle, train) {
      const customEntry = {
        TrainingCode: 'CUSTOM_' + Date.now(),
        TrainingTitle: newTitle,
      };
      this.newTrainingList.push(customEntry);
      train.selectedTraining = customEntry;
      train.TrainingCode = customEntry.TrainingCode;
      train.TrainingTitle = customEntry.TrainingTitle;
    },
    addCustomTrainingA(newTag,type, index = null) {
      const customTraining = {
        TrainingCode: null,
        TrainingTitle: newTag,
        TrainingType: type, // Let user select this later
        // CompetencyType: 'Custom', // Or 'Future' if for Area fields
        TrainingDate: `${this.highestYear}-06-01`
      };

      // Add to list so it appears in options
      this.newTrainingList.push(customTraining);
      // this.training.push(customTraining);

      // Assign based on type
      if (type === 'AreaOne') {
        this.form.AreaOne = customTraining;
      } else if (type === 'AreaTwo') {
        this.form.AreaTwo = customTraining;
      }
    },
    validateWordCountsFuture() {
      let hasError = false;

      const oneWordCount = this.form.FutureTrainingOneDetails.trim().split(/\s+/).filter(Boolean).length;
      const twoWordCount = this.form.FutureTrainingTwoDetails.trim().split(/\s+/).filter(Boolean).length;
      const message = `Maximum 30 Words. Currently: `;

      if ( oneWordCount > 30) {

        this.form.errors.set('FutureTrainingOneDetails',  message +oneWordCount);
        hasError = true;
      }
      if (twoWordCount > 30) {
        this.form.errors.set('FutureTrainingTwoDetails',  message + oneWordCount);
        hasError = true;
      }
      return hasError;
    },
    validateInitiativesBackup() {
      let hasError = false;
      const titleSet = new Set();

      this.form.initiative.forEach((item, index) => {
        if (!this.errors.PersonalIN[index] || typeof this.errors.PersonalIN[index] !== 'object') {
          this.errors.PersonalIN[index] = {};
        }
        const title = item.Name?.trim() || '';
        const wordCount = item.Name?.trim().split(/\s+/).filter(Boolean).length || 0;
        if (!item.Name) {
          this.errors.PersonalIN[index].Name = 'Name is required.';
          this.errorNoti(this.errors.PersonalIN[index].Name);
          hasError = false;
        }else {
          if (wordCount > 40) {
            if (!this.errors.PersonalIN[index]) this.errors.PersonalIN[index] = {};
            this.errors.PersonalIN[index].Name = `Maximum 40 Words.`;
            this.errorNoti(`Initiative ${index + 1}: ${this.errors.PersonalIN[index].Name}`);
            hasError = true;
          }else {
            if (titleSet.has(title.toLowerCase())) {
              this.errors.PersonalIN[index].Name = 'Duplicate title found.';
              this.errorNoti(`Initiative ${index + 1}: ${this.errors.PersonalIN[index].Name}`);
              hasError = true;
            } else {
              titleSet.add(title.toLowerCase());
              this.errors.PersonalIN[index].Name = '';
            }
          }
        }
        if (!item.Type) {
          this.errors.PersonalIN[index].Type = 'Type is required.';
          this.errorNoti(this.errors.PersonalIN[index].Type);
          hasError = false;
        }else {
          this.errors.PersonalIN[index].Type = ''
        }
        if (!item.Date) {
          this.errors.PersonalIN[index].Date = 'Date is required.';
          // this.errorNoti(this.errors.PersonalIN[index].Date);
          hasError = false;
        }else {
          this.errors.PersonalIN[index].Date = ''
        }

      });
      return hasError;
    },
    validateInitiatives() {
      let hasError = false;
      const titleSet = new Set();

      this.form.initiative.forEach((item, index) => {
        if (!this.errors.PersonalIN[index] || typeof this.errors.PersonalIN[index] !== 'object') {
          this.errors.PersonalIN[index] = {};
        }

        const title = item.Name?.trim() || '';
        const wordCount = item.Name?.trim().split(/\s+/).filter(Boolean).length || 0;

        // Name Validation
        if (!item.Name) {
          this.errors.PersonalIN[index].Name = 'Name is required.';
          hasError = true;
        } else if (wordCount > 40) {
          this.errors.PersonalIN[index].Name = 'Maximum 40 Words allowed.';
          hasError = true;
        } else if (titleSet.has(title.toLowerCase())) {
          this.errors.PersonalIN[index].Name = 'Duplicate title found.';
          hasError = true;
        } else {
          this.errors.PersonalIN[index].Name = '';
          titleSet.add(title.toLowerCase());
        }

        // Type Validation
        if (!item.Type) {
          this.errors.PersonalIN[index].Type = 'Type is required.';
          hasError = true;
        } else {
          this.errors.PersonalIN[index].Type = '';
        }

        // Date Validation
        if (!item.Date) {
          this.errors.PersonalIN[index].Date = 'Date is required.';
          hasError = true;
        } else {
          this.errors.PersonalIN[index].Date = '';
        }
      });

      return hasError;
    },
    validateRequiredTraining() {
      let hasError = false;

      if (!this.errors.RequiredIN || typeof this.errors.RequiredIN !== 'object') {
        this.errors.RequiredIN = {};
      }

      const titleSet = new Set();

      this.form.training.forEach((item, index2) => {

        if (!this.errors.RequiredIN[index2]) this.errors.RequiredIN[index2] = {};

        // Training Title Validation
        const title = item.TrainingTitle?.trim() || '';

        if (!title) {
          this.errors.RequiredIN[index2].TrainingTitle = 'Training Title is required.';
          hasError = true;
        } else if (titleSet.has(title.toLowerCase())) {
          this.errors.RequiredIN[index2].TrainingTitle = 'Duplicate title found.';
          hasError = true;
        } else {
          this.errors.RequiredIN[index2].TrainingTitle = '';
          titleSet.add(title.toLowerCase());
        }

        // Training Type Validation
        if (!item.TrainingType) {
          this.errors.RequiredIN[index2].TrainingType = 'Type is required.';
          hasError = true;
        } else {
          this.errors.RequiredIN[index2].TrainingType = '';
        }

        // Training Date Validation
        if (!item.TrainingDate) {
          this.errors.RequiredIN[index2].TrainingDate = 'Date is required.';
          hasError = true;
        } else {
          this.errors.RequiredIN[index2].TrainingDate = '';
        }
      });

      return hasError;
    },
    validateRequiredTrainingBackup() {
      let hasError = false;
      const titleSet = new Set();

      if (!this.errors.RequiredIN || typeof this.errors.RequiredIN !== 'object') {
        this.errors.RequiredIN = {};
      }

      this.form.training.forEach((item, index2) => {

        if (!this.errors.RequiredIN[index2]) this.errors.RequiredIN[index2] = {};

        const title = item.TrainingTitle?.trim() || '';

        if (!item.TrainingTitle) {
          this.errors.RequiredIN[index2].TrainingTitle = 'Training Title is required.';
          // this.errorNoti(this.errors.RequiredIN[index2].TrainingTitle);
          hasError = false;
        }else {
          if (titleSet.has(title.toLowerCase())) {
            this.errors.RequiredIN[index2].TrainingTitle = 'Duplicate title found.';
            // this.errorNoti(`Initiative ${index2 + 1}: ${this.errors.RequiredIN[index2].TrainingTitle}`);
            hasError = true;
          } else {
            titleSet.add(title.toLowerCase());
            this.errors.RequiredIN[index2].TrainingTitle = '';
          }
        }

        if (!item.TrainingType) {
          this.errors.RequiredIN[index2].TrainingType = 'Type is required.';
          // this.errorNoti(this.errors.RequiredIN[index2].TrainingType);
          hasError = false;
        }else{
          this.errors.RequiredIN[index2].TrainingType = ''
        }
        console.log(item.TrainingDate)
        if (!item.TrainingDate) {
          console.log('ok')
          this.errors.RequiredIN[index2].TrainingDate = 'Date is required.';
          // this.errorNoti(this.errors.RequiredIN[index2].TrainingDate);
          hasError = false;
        }else{
          console.log('not ok')
          this.errors.RequiredIN[index2].TrainingDate = ''
        }

      });

      return hasError;
    },
    validateFutureTrainingDuplicate() {

      let hasError = false;
      const titleSet = new Set();

      const titles = [
        { key: 'AreaOne', label: 'Future Training 1', value: this.form.AreaOne.TrainingTitle?.trim() || '' },
        { key: 'AreaTwo', label: 'Future Training 2', value: this.form.AreaTwo.TrainingTitle?.trim() || '' },
        { key: 'FutureTrainingOneDetails', label: 'Future Training Details 1', value: this.form.FutureTrainingOneDetails?.trim() || '' },
        { key: 'FutureTrainingTwoDetails', label: 'Future Training Details 2', value: this.form.FutureTrainingTwoDetails?.trim() || '' },
      ];

      // Reset all errors first
      // for (const t of titles) {
      //   this.errors[t.key] = '';
      // }

      for (const t of titles) {
        const lowerVal = t.value.toLowerCase();

        if (t.value && titleSet.has(lowerVal)) {
          this.errors[t.key] = 'Duplicate data found.';
          // this.errorNoti(`${t.label}: ${this.errors[t.key]}`);
          hasError = true;
        } else {
          titleSet.add(lowerVal);
        }
      }
      return hasError;
    },
    validateFormFields() {
      const requiredFields = [
        'AppraisalPeriod', 'StaffID', 'EmployeeName', 'Designation', 'OfficialEmail', 'Mobile',
        'SuppervisorStaffID', 'AreaOne',
        'FutureTrainingOneDetails', 'AreaTwo', 'FutureTrainingTwoDetails'
      ];
      let isValid = true;
      for (const field of requiredFields) {
        if (!this.form[field]) {
          const formattedField = field.replace(/([A-Z])/g, ' $1').trim();
          const message = `${formattedField} is required.`;
          this.form.errors.set(field, message);
          isValid = false;
        }else {
          //shanto bhai this field is not working properly for areaone
          this.form.errors.clear(field);
        }
      }
      // for (const [i, item] of this.form.initiative.entries()) {
      //   if (!item.Name || !item.Type || !item.Date) {
      //     const message=`Personal Initiative ${i + 1} is incomplete.`;
      //     this.form.errors.set(item, message);
      //     this.errorNoti(message);
      //     return false;
      //   }
      // }
      // for (const [i, item] of this.form.training.entries()) {
      //   if (!item.TrainingTitle|| !item.TrainingType || !item.TrainingDate) {
      //     const message=`Required Training ${i + 1} is incomplete.`;
      //     this.form.errors.set(item, message);
      //     this.errorNoti(message);
      //     return false;
      //   }
      // }
      return isValid;
    },
    buildFormData() {
      const formData = new FormData();
      const futureTrainingTitleOne =  this.form.AreaOne.TrainingCode;
      const futureTrainingTitleTwo =  this.form.AreaTwo.TrainingCode;
      if(futureTrainingTitleOne && futureTrainingTitleTwo){
        formData.append('futureTrainingTitleOne', futureTrainingTitleOne);
        formData.append('futureTrainingTitleTwo', futureTrainingTitleTwo);
      }

      if (this.croppedBlob) {
        formData.append('Signature', this.croppedBlob, 'signature.jpg');
      }
      for (const key in this.form) {
        if (['initiative', 'training', 'Signature'].includes(key)) continue;
        formData.append(key, this.form[key]);
      }
      this.form.initiative.forEach((item, index) => {
        formData.append(`initiative[${index}][Name]`, item.Name);
        formData.append(`initiative[${index}][Type]`, item.Type);
        formData.append(`initiative[${index}][Date]`,  moment(item.Date).format('YYYY-MM-DD H:mm:ss'));
      });

      this.form.training.forEach((item, index) => {
        formData.append(`training[${index}][TrainingCode]`, item.TrainingCode);
        formData.append(`training[${index}][TrainingTitle]`, item.TrainingTitle);
        formData.append(`training[${index}][TrainingType]`, item.TrainingType);
        formData.append(`training[${index}][TrainingDate]`,  moment(item.TrainingDate).format('YYYY-MM-DD H:mm:ss'));
      });
      return formData;
    },
    findDuplicateTitle() {
      let hasError = false;
      const compareList = [];

      // Add titles
      compareList.push(
          { key: 'AreaOne', section: 'titles', label: 'Future Training 1', value: this.form.AreaOne.TrainingTitle?.trim() || '' },
          { key: 'AreaTwo', section: 'titles', label: 'Future Training 2', value: this.form.AreaTwo.TrainingTitle?.trim() || '' },
          { key: 'FutureTrainingOneDetails', section: 'titles', label: 'Future Training Details 1', value: this.form.FutureTrainingOneDetails?.trim() || '' },
          { key: 'FutureTrainingTwoDetails', section: 'titles', label: 'Future Training Details 2', value: this.form.FutureTrainingTwoDetails?.trim() || '' }
      );

      // Add initiative entries
      this.form.initiative.forEach((item, index) => {
        compareList.push({
          key: `PersonalIN-${index}`,
          section: 'PersonalIN',
          label: `Initiative[${index + 1}]`,
          value: item.Name?.trim() || '',
          index
        });
      });

      // Add training titles
      this.form.training.forEach((item, index) => {
        compareList.push({
          key: `RequiredIN-${index}`,
          section: 'RequiredIN',
          label: `Training[${index + 1}]`,
          value: item.TrainingTitle?.trim() || '',
          index
        });
      });

      // 3. Detect duplicates
      const seen = {};      // key = value, value = first item
      const duplicates = {}; // key = value, value = original item

      compareList.forEach(item => {
        const val = item.value.toLowerCase();
        if (!val) return;

        if (seen[val]) {
          duplicates[val] = seen[val]; // save the first occurrence
        } else {
          seen[val] = item;
        }
      });

      // 4. Assign errors
      compareList.forEach(item => {
        const val = item.value.toLowerCase();
        if (duplicates[val]) {
          hasError = true;
          const original = duplicates[val];
          const message = `The value "${item.value}" is duplicated.`;
          if (item.section === 'titles') {
            this.errors[item.key] = message;
          } else if (item.section === 'PersonalIN') {
            this.errors.PersonalIN[item.index].Name = message;
          } else if (item.section === 'RequiredIN') {
            this.errors.RequiredIN[item.index].TrainingTitle = message;
          }
        }
      });

      // 5. Optional: Show toast or UI message
      if (hasError) {
        this.errorNoti('There are duplicate values in your form.');
      }
      return hasError;
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
      axios.get(baseurl+'api/get-new-training?StaffID='+this.form.StaffID
          +'&Period='+this.form.AppraisalPeriod
      ).then((response)=>{
        this.suggestive_list = response.data.data;
        $("#suggestiveModal").modal("show");
      }).catch((error)=>{
      })

      // axios.get(baseurl+'api/get-level-wise-suggestive-list/' + this.form.StaffID).then((response)=>{
      //   this.suggestive_list = response.data.suggestive_list;
      //   $("#suggestiveModal").modal("show");
      // }).catch((error)=>{
      //
      // })
    },
    getData() {
      axios.get(baseurl+'api/get-agree-business-user').then((response)=>{
        this.dropDown = response.data.dropDown
      }).catch((error)=>{

      })
    },
    getUserData() {
      this.axiosPost('me', {}, (response) => {
        this.Type = response.payload.Type;
        this.form.AppraisalPeriod = response.appraisalPeriod;
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
    onFileChange(e) {
      const file = e.target.files[0];
      if (file) {
        this.imageUrl = URL.createObjectURL(file); // this stores the image URL
        this.previewUrl = null;
        this.croppedBlob = null;

        $('#cropperModal').modal('show');
      }
    },
    prepareCrop() {
      const canvas = this.$refs.cropper.getCroppedCanvas({
        width: 200,
        height: 60,
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
      });

      if (!canvas) {
        alert("Something went wrong! Image source not readable");
        return;
      }

      canvas.toBlob(blob => {
        if (!blob) {
          alert("Failed to generate cropped image.");
          return;
        }

        this.croppedBlob = blob;

        // Optional: Preview base64 image from the blob
        const reader = new FileReader();
        reader.onload = e => {
          this.form.Signature = e.target.result; // for preview or hidden input
        };
        reader.readAsDataURL(blob);
        this.previewUrl = URL.createObjectURL(blob)
        // Or directly upload/send this blob:
        // this.uploadImage(blob);
      }, 'image/jpeg', 0.95); // high quality
      $('#cropperModal').modal('hide')
    },
    resetCropper() {
      this.imageUrl = null
      this.previewUrl = null
      this.croppedBlob = null
      this.$nextTick(() => {
        this.$refs.fileInput.value = null;
      });
      $('#cropperModal').modal('hide')
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
    //for initiative
    addFind: function () {
      if (this.form.initiative.length < 5) {
        if (!Array.isArray(this.form.initiative)) {
          this.form.initiative = [];
        }
        this.form.initiative.push({ Name: '', Type: '', Date: null });
      } else {
        this.errorNoti('No more than 5 training entries can be added!');
      }
    },
    deleteFind: function (index) {
      this.form.initiative.splice(index, 1);
    },
    //for training
    Training_addFind: function () {
      if (this.form.training.length < 5) {
        if (!Array.isArray(this.form.training)) {
          this.form.training = [];
        }

        this.form.training.push({ TrainingTitle: '', TrainingType: '', TrainingDate:moment().format('DD-MM-YYYY')});
      } else {
        this.errorNoti('No more than 5 training entries can be added!');
      }
      // this.form.training.push({ TrainingTitle: '' , TrainingType: '', TrainingDate: ''});
    },
    Training_deleteFind: function (index2) {
      this.form.training.splice(index2, 1);
    },
    getTrainingHistory(){
      axios.get(baseurl +'api/mdp/get-export-training-history?empcode='+ this.form.StaffID).then((response)=>{
        let dataSets = response.data.training_history
        if (dataSets){
          this.training_history =response.data.training_history
        }else{
          console.log('error');
        }
      }).catch((error)=>{
        console.log(response)
      })

    },
    downloadTraining(){
      axios.get(baseurl +'api/mdp/get-export-training-history?empcode='+ this.form.StaffID).then((response)=>{
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
    modalHide(){
      $("#suggestiveModal").modal("hide");
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD')
    },
    editCustomFormat(date){
      return moment(date).format('YYYY-MM-DD')
    },
    reload(){
      this.clearFormDataState()
      window.location.reload();
    },
    downloadInfo() {
      // Replace with your actual PDF file URL
      const link = document.createElement('a');
      link.href = baseurl+'/file/contact/Contact-Details.pdf';
      link.download = 'MDP_Contact_Info.pdf';
      document.body.appendChild(link);
      link.click();
      link.remove();
    }
  },
}
</script>
<style scoped>

.loader-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh; /* vertically centered */
  background-color: #f8f9fa; /* light background (optional) */
}

.skeleton-card {
  background: #fff;
  padding: 24px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 100%;
  max-width: 500px;
}

.skeleton-line {
  height: 16px;
  background-color: #e0e0e0;
  border-radius: 4px;
  margin-bottom: 12px;
  animation: pulse 1.5s infinite;
}

.w-full {
  width: 100%;
}

.w-2 {
  width: 50%;
}

.w-4 {
  width: 75%;
}

@keyframes pulse {
  0% { opacity: 1; }
  50% { opacity: 0.5; }
  100% { opacity: 1; }
}
::v-deep .multiselect__option {
  white-space: normal !important;
  overflow-wrap: break-word;
  word-break: break-word;
  max-width: 100%;
  font-size: 12px;
}
::v-deep .multiselect__content-wrapper {
  max-width: 100% !important;
  white-space: normal;
}
::v-deep .multiselect {
  font-size: 12px;
}
::v-deep .multiselect__single {
  font-size: 12px;
}
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
