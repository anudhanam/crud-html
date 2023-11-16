<?php include './parts/header.html'; ?>

    <div class="container mt-5" id="edit_add_form">
        <div class="col-12" style="text-align: right;"> 
          <a href="list.php" type="button" class="btn btn-primary">List Employees</a></div>
       
        <!-- <div class="row mt-5"> -->
        <h2>Employee Form</h2>
        <div class="alert alert-success" role="alert" id="msg_success" style="display:none">
            Employee added successfully.
          </div>
        <!-- <form id="employeeForm" novalidate> -->
            <form id="employeeForm">
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
          <div class="mb-3">
            <button type="button" class="btn btn-primary" v-on:click="checkForm()">Save</button>
          </div>
          </form>
        <!-- </div> -->
    </div>
    <?php include './parts/footer.html'; ?>