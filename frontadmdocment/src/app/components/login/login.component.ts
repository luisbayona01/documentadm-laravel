import { Component, OnInit } from '@angular/core';

import { ToastrService } from 'ngx-toastr';
import * as $ from 'jquery';
import {HttpClient,HttpHeaders} from '@angular/common/http';
import { Router } from '@angular/router';
import{AuthService }from '../../services/auth.service';
@Component({
  selector: 'login.component',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  public username: string;
  public  password: string;
  public email: string;
  public  response:any=[];
 //public  user:any;
  constructor(private authService: AuthService, 
 private toastr: ToastrService,private httpClient:HttpClient,
 private router: Router) {
   this.email='';
   this.username='';
   this.password='';

    //$("#loading").hide();
    //this.router.navigate(['']);
   }

  ngOnInit() {
  }

formlogin(){
   $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $("#login-form-link").addClass('active');
    //e.preventDefault();

}

formregister(){
$("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $("#register-form-link").addClass('active');
   // e.preventDefault();

}

logear(){
$("#loading2").show();
  

  let selector: any;
  //document.querySelector('#formupdateiax')
  selector =  document.querySelector('#login-form');
  let isValid = selector.reportValidity();
 
  if (isValid==false) {
   $('#login-form').addClass('was-validated')
   $("#loading2").hide();
  //return false;
  }else{
  const formData = new FormData();
    formData.append('email', this.email);
    formData.append('password', this.password);

    this.authService.login(formData).subscribe(
      response => {
  //console.log(response);
    this.response=response;
   if(this.response['ok']==true){
      $("#loading2").hide();
          this.email='';
          this.password='';
          localStorage.setItem('token',this.response['token']);
          this.router.navigate(['documentos']);   
     }else{
       $("#loading2").hide();
          this.email='';
          this.password='';  
          this.toastr.error(this.response['user'])
     } 


//;
        // Procesar la respuesta del servidor
      },
      error => {
       this.email='';
       this.password='';
        // Manejar el error
         console.error(error);
      }
    );
}
  

}
register(){
  $("#loading").show();
  let selector: any;
  //document.querySelector('#formupdateiax')
  selector =  document.querySelector('#register-form');
  let isValid = selector.reportValidity();

  
  if (isValid==false) {
   $('#register-form').addClass('was-validated')
 $("#loading").hide();
  //return false;
  }else{

 const formData = new FormData();
    formData.append('name', this.username);
    formData.append('password', this.password);
   formData.append('email', this.email);
    this.authService.register(formData).subscribe(
      response => {
     this.response=response;
       if(this.response['ok']==true){
      $("#loading").hide();
          this.email='';
          this.username='';
          this.password='';
          this.toastr.success(this.response['menssage'])


     }else{
       $("#loading").hide();
          this.email='';
          this.username='';
          this.password='';
          this.toastr.error(this.response['menssage'])
     } 
       
      },
      error => {
          $("#loading").hide();
          this.email='';
          this.username='';
          this.password='';
        // Manejar el error
         console.error(error);
      }
    );



} 
  }

  



}
