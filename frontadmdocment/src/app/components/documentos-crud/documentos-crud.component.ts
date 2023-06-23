import { Component, OnInit } from '@angular/core';

import { ToastrService } from 'ngx-toastr';
import * as $ from 'jquery';
import 'datatables.net';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Router } from '@angular/router';
import { DocumentosServiceService } from '../../services/documentos-service.service';
import{AuthService }from '../../services/auth.service';
import { Documento } from '../../interfaces/documento';
import { Tipodocumento } from '../../interfaces/tipodocumento';
import { Proceso } from '../../interfaces/proceso';
@Component({
  selector: 'app-documentos-crud',
  templateUrl: './documentos-crud.component.html',
  styleUrls: ['./documentos-crud.component.css']
})
export class DocumentosCRUDComponent implements OnInit {

  public nombre: string;
  public contenido: string;
  public tipo_doc_id: string;
  public proceso_id: string;
  data: any = [];
  documentos: Documento[] = [];
  proceso:Proceso[]=[];
  tipodocumento:Tipodocumento[]=[]; 


  constructor(private authService: AuthService, 
       private documentosService: DocumentosServiceService, 
       private toastr: ToastrService, 
       private httpClient: HttpClient,
       private router: Router) {
    this.nombre = '';
    this.contenido = '';
    this.tipo_doc_id = '';
    this.proceso_id = '';


  }

  ngOnInit(): void {
    this.listarDocumentos()
    this.getdataproceso();
    this.getTipoDoc();
  }

  getdataproceso():void{
  this.documentosService.getProcesos().subscribe(
        response => {
          this.proceso = response;
          

        },
        error => {
          console.error(error);
        }
      );

} 

getTipoDoc():void{
  this.documentosService.getTipoDocumentos().subscribe(
        response => {
          this.tipodocumento = response;
          

        },
        error => {
          console.error(error);
        }
      );

} 

  initializeDataTables(): void {
    let elem: any;
    $(document).ready(function () {

      $("#documento").DataTable();
    });
  }

  listarDocumentos() {
    this.documentosService.listarDocumentos().subscribe(
      response => {

        this.data = response;
        this.documentos = this.data['data'];
        this.initializeDataTables()
      },
      error => {
        console.error(error);
      }
    );
  }

elminarDocumentos(docId: number){
 this.documentosService.eliminarDocumento(docId)
      .subscribe(
        (response) => {
  this.toastr.success( response['message'])
         this.listarDocumentos();
          // Realiza cualquier acción adicional después de eliminar
        },
        error => {
          console.error('Error al eliminar:', error);
          // Maneja el error de eliminación
        }
      );
}

  registrarDocumentos() {
    let selector: any;
    //document.querySelector('#formupdateiax')
    selector = document.querySelector('#registerdoc');
    let isValid = selector.reportValidity();
    if (isValid == false) {
      $('#registerdoc').addClass('was-validated')
      //return false;
    } else {

      const formData = new FormData();

      formData.append('nombre', this.nombre);
      formData.append('contenido', this.contenido);
      formData.append('tipo_doc_id', this.tipo_doc_id);
      formData.append('proceso_id', this.proceso_id);

      this.documentosService.registrarDocumento(formData).subscribe(
        response => {
          this.data = response;
          if (this.data['ok'] == true) {
            //console.log('Documento registrado correctamente');
            this.toastr.success(this.data['message'])
            this.listarDocumentos();
            this.nombre = '';
            this.contenido = '';
            this.tipo_doc_id = '';
            this.proceso_id = '';

          } else {
            this.toastr.error("ocurrio un error");
            this.nombre = '';
            this.contenido = '';
            this.tipo_doc_id = '';
            this.proceso_id = '';
          }

        },
        error => {
          console.error(error);
        }
      );
    }
  }
logout(){

this.authService.logout().subscribe(
        response => {
          this.data = response;
          localStorage.removeItem('token');
          this.router.navigate(['']);

        },
        error => {
          console.error(error);
        }
      );


}


}


