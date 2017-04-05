<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

Vue.http.interceptors.push((request, next) => {
    request.headers['X-CSRF-TOKEN'] = Laravel.csrfToken;

    next();
});     
<script>
    export default {
        mounted() {
            console.log('Component mounted.');
			


   axios.get('/HRNTitan/api/user').then(function (response) {   
                  console.log(response.data)  })                 
                  .catch(function (response) {                    
                   console.error(response);                 
                   });         
                   

   axios.get('api/speakers?event=london').then(function (response) {   
                  console.log(response.data)  })                 
                  .catch(function (response) {                    
                   console.error(response);                 
                   });   
/*
   axios.post('api/speakers?event=amsterdam&pagetype=preevent&name=TestName2&title=TestTitle&bio=Biotest&status=1').then(function (response) {   
                  console.log(response.data)  })                 
                  .catch(function (response) {                    
                   console.error(response);                 
                   });                      
*/
		
        }
    }
</script>
