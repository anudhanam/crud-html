const empListElement = document.getElementById('app_list');
// Load the below script in Employee Listing page
if (empListElement) {
const appList = new Vue({
    el: '#app_list',
    data:{
      employees_data : [],
      isEditing: false,
      formData:{
        name: '',
        phone: '',
        email: '',
        address: '',
        designation: ''
      },      
        errors:[],
        employeeId: '',
        msg_update: false,
    },
    computed: {
       
    },
    mounted() {
        this.getEmployees();
      },
    methods:{
      getEmployees: function () {

        axios.get('http://localhost:3000/employees', {
      headers: {
        'Content-Type': 'application/json', 
      }}).then(response => {
        this.employees_data = response.data;
       console.log(response.data);
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error. Please try again.');
    });       
  
        // e.preventDefault();
      },
      getEmployeeRecord: function () {
return new Promise((resolve, reject)=>{
        axios.get('http://localhost:3000/employees/'+ this.employeeId , {
      headers: {
        'Content-Type': 'application/json', 
      }}).then(response => {

        console.log('response', response.data[0].name);
        let dataObj = response.data[0];
        if (response.data) {
          this.formData.name = dataObj.name;
          this.formData.phone = dataObj.phone;
          this.formData.email = dataObj.email;
          this.formData.address = dataObj.address;
          this.formData.designation = dataObj.designation;
        };
       console.log(this.formData);
       resolve();
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error. Please try again.');
        reject();
    });  
  }); 
  },
      deleteEmployee: function (id) {
        return new Promise((resolve, reject)=>{
          axios.delete('http://localhost:3000/employees/'+id, {
          headers: {
            'Content-Type': 'application/json', 
          }}).then(response => {
           console.log(response.data);
           resolve();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error in deleting record. Please try again.');
            reject(err);
        }).then (()=>{
          //reload the data after delete
          this.getEmployees();
        })
        });
                 
      },
      editEmployee: function (id) {
        this.employeeId = id;
        this.msg_update = false;
        this.getEmployeeRecord().then(function () {
          this.isEditing = true;
          console.log('this.isEditing', this.isEditing);

        });        
        
        // $('#editModal').modal('show');

      },
      editForm: function() {
      // e.preventDefault();
      if(this.formData['name'] && this.formData['phone'] && this.formData['email'] 
      && this.formData['address'] && this.formData['designation']) {
        this.updateEmployee().then(()=>{
          this.getEmployees();
        })
      }
      this.errors = [];
      if(!this.formData['name']) this.errors.push("Name required.");
      if(!this.formData['phone']) this.errors.push("Phone required.");
      if(!this.formData['email']) this.errors.push("Email Address required.");
      if(!this.formData['address']) this.errors.push("Address required.");
      if(!this.formData['designation']) this.errors.push("Designation required.");        
    },  
    updateEmployee: function() {
      return new Promise((resolve, reject) => {

        if (this.employeeId) {
          this.formData.id = this.employeeId;

          axios.patch('http://localhost:3000/employees', this.formData, {
        headers: {
          'Content-Type': 'application/json', 
        }}).then(response => {
          this.isEditing = false;
          // alert('Employee added successfully!');
          this.msg_update = true;
          this.formData = {};
          $('#editModal').modal('hide');
          resolve();
      })
      .catch(error => {
          console.error('Error:', error);
          alert('Error. Please try again.');
          reject();
      });
  
  
        } else {
          alert('Error in updating record. Please try again.');
          reject();
  
        }
        
      })
      

    },
      
    }    
    
  })
}


const empAddElement = document.getElementById('app_add_form');
// Load the below script in Employee Listing page
if (empAddElement) {
const appAddForm = new Vue({
    el: '#app_add_form',
    data:{
      formData:{
      name: '',
      phone: '',
      email: '',
      address: '',
      designation: ''
    },      
      errors:[],
    },
    computed: {
       
    },
    mounted() {
      console.log("add form");
      },
    methods:{
      addEmployee: function () {
        console.log('formData', this.formData);
        // return false;

        axios.post('http://localhost:3000/employees', this.formData, {
      headers: {
        'Content-Type': 'application/json', 
      }}).then(response => {
        // alert('Employee added successfully!');
        $("#msg_success").text("Employee addedd successfully.");
        $("#msg_success").show();
        this.formData = {};
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error. Please try again.');
    });
      },
      checkForm: function() {
        // e.preventDefault();
        if(this.formData['name'] && this.formData['phone'] && this.formData['email'] 
        && this.formData['address'] && this.formData['designation']) {
          this.addEmployee();
        }
        this.errors = [];
        if(!this.formData['name']) this.errors.push("Name required.");
        if(!this.formData['phone']) this.errors.push("Phone required.");
        if(!this.formData['email']) this.errors.push("Email Address required.");
        if(!this.formData['address']) this.errors.push("Address required.");
        if(!this.formData['designation']) this.errors.push("Designation required.");        
      }
    }
  });
}

const empEditElement = document.getElementById('edit_add_form');
// Load the below script in Employee Listing page
if (empAddElement) {
const appAddForm = new Vue({
    el: '#edit_add_form',
    data:{
      formData:{
      name: '',
      phone: '',
      email: '',
      address: '',
      designation: ''
    },      
      errors:[],
    },
    computed: {
       
    },
    mounted() {
      console.log("add form");
      getEmployee();
      },
    methods:{
      addEmployee: function () {
        console.log('formData', this.formData);
        // return false;

        axios.post('http://localhost:3000/employees', this.formData, {
      headers: {
        'Content-Type': 'application/json', 
      }}).then(response => {
        // alert('Employee added successfully!');
        $("#msg_success").text("Employee addedd successfully.");
        $("#msg_success").show();
        this.formData = {};
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error. Please try again.');
    });
      },
      checkForm: function() {
        // e.preventDefault();
        if(this.formData['name'] && this.formData['phone'] && this.formData['email'] 
        && this.formData['address'] && this.formData['designation']) {
          this.addEmployee();
        }
        this.errors = [];
        if(!this.formData['name']) this.errors.push("Name required.");
        if(!this.formData['phone']) this.errors.push("Phone required.");
        if(!this.formData['email']) this.errors.push("Email Address required.");
        if(!this.formData['address']) this.errors.push("Address required.");
        if(!this.formData['designation']) this.errors.push("Designation required.");        
      }
    }
  });
}






































