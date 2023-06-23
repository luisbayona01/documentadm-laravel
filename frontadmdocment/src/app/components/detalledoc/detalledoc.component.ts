import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { DocumentosServiceService } from '../../services/documentos-service.service';
import { Documento } from '../../interfaces/documento';
import { Tipodocumento } from '../../interfaces/tipodocumento';
import { Proceso } from '../../interfaces/proceso';
import { ToastrService } from 'ngx-toastr';
import { Router } from '@angular/router';

@Component({
  selector: 'app-detalledoc',
  templateUrl: './detalledoc.component.html',
  styleUrls: ['./detalledoc.component.css']
})
export class DetalledocComponent implements OnInit {
 
 nuevoDocumento: Documento = {
    doc_id: 0,
    doc_codigo: '',
    doc_nombre: '',
    doc_contenido: '',
    proceso:'',
    tipodoc:'',
    
  
   
  };
dataresponse: any = {};
iddoc:number=0;
 proceso:Proceso[]=[];
  tipodocumento:Tipodocumento[]=[]; 
  constructor ( private router: Router,
                private toastr: ToastrService,
                private activatedRoute: ActivatedRoute,
                private documentosService: DocumentosServiceService) { 
  
}

  ngOnInit(): void {
    this.activatedRoute.params.subscribe(params => {
      const id = params['id'];
    this.iddoc=id
  //console.log(id);
      this.documentosService.obtenerDocumento(id).subscribe(data => {
      this.dataresponse=data;
      this.nuevoDocumento=this.dataresponse.data;
      this.nuevoDocumento.proceso=this.dataresponse.data.doc_id_proceso
      this.nuevoDocumento.tipodoc=this.dataresponse.data.doc_id_tipo  
       //this.dataresponse.data.doc_codigo   
        //this.dataresponse.doc_nombre;
      });
    });
this.getdataproceso();
this.getTipoDoc();
  }

 getdataproceso():void{
 this.nuevoDocumento.proceso=''
      this.nuevoDocumento.tipodoc='' 
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
   this.nuevoDocumento.proceso=''
   this.nuevoDocumento.tipodoc=''
  this.documentosService.getTipoDocumentos().subscribe(
        response => {
          this.tipodocumento = response;
          

        },
        error => {
          console.error(error);
        }
      );

} 



 gdarCambiosDoc(){


console.log(this.nuevoDocumento.proceso= this.nuevoDocumento.proceso);
console.log(this.nuevoDocumento.tipodoc=this.nuevoDocumento.tipodoc);
console.log(this.nuevoDocumento);
//return false; 
this.documentosService.updateDocumento(this.nuevoDocumento,this.iddoc).subscribe(data => {
      this.dataresponse=data;
 console.log(this.dataresponse);
  this.toastr.success( this.dataresponse['message']);
  //this.router.navigate(['documentos'])     
 
      });
//console.log(this.iddoc);
   }


}

   


