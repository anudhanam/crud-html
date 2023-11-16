<?php include './parts/header.html'; ?>
<div class="container mt-5" id="app_list">
<div v-if="msg_update" class="alert alert-success" role="alert" id="msg_success">
            Employee added successfully.
          </div>
<h2>Employee Listing</h2>
<div class="col-12" style="text-align: right;">
<a href="add.php" type="button" class="btn btn-primary">Add New Employee</a>
</div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Designation</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <tr v-for="emp in employees_data" :key="emp.id">
          <td>{{ emp.id }}</td>
          <td>{{ emp.name }}</td>
          <td>{{ emp.phone }}</td>
          <td>{{ emp.email }}</td>
          <td>{{ emp.address }}</td>
          <td>{{ emp.designation }}</td>
          <td>
            <a href="#" v-on:click="editEmployee(emp.id)" type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a>
          <a href="#" v-on:click="deleteEmployee(emp.id)" type="button" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>          
        </tbody>
      </table>

<template>
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" v-show="isEditing">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- edit form starts -->
      <form id="employeeForm">
      <div class="modal-body">        
        
            <p v-if="errors.length" class="text-danger">
           <b>Please correct the following error(s):</b>
           <ul class="text-danger">
            <li v-for="error in errors">{{ error }}</li>
           </ul>
            </p>
            <div class="mb-3">
              <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" v-model="formData.name">
              <!-- <div class="invalid-feedback">Please enter your Name.</div> -->
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="phone" v-model="formData.phone" required>
              <!-- <div class="invalid-feedback">Please enter your Phone.</div> -->
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="email" v-model="formData.email" required>
              </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="address" v-model="formData.address" required>
              </div>
              <div class="mb-3">
                <label for="designation" class="form-label">Designation<span class="text-danger">*</span></label>
                <select class="form-select" aria-label="Designation" id="designation" v-model="formData.designation" required>
                    <option selected>Select</option>
                    <option value="Senior Manager">Senior Manager</option>
                    <option value="Manager">Manager</option>
                    <option value="Software Developer">Software Developer</option>
                    <option value="Administrator">Administrator</option>
                    <option value="HR">HR</option>
                    <option value="Other">Other</option>

                  </select>
              </div>
          <!-- <div class="mb-3">
            <button type="button" class="btn btn-primary" v-on:click="checkForm()">Submit</button>
          </div> -->
          
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" v-on:click="editForm()">Save changes</button>
      </div>
      </form>
      <!-- edit form ends -->
    </div>
  </div>
</div>
<!-- Modal ends -->
</template>
</div>
      <?php include './parts/footer.html'; ?>