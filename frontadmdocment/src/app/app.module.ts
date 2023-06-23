import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';
import {routing,appRoutingProviders} from './app.routing';
import { CommonModule } from '@angular/common';
import { AppComponent } from './app.component';
import { ToastrModule, ToastNoAnimation, ToastNoAnimationModule } from 'ngx-toastr';
import { LoginComponent } from './components/login/login.component';
import { DocumentosCRUDComponent } from './components/documentos-crud/documentos-crud.component';
import { DetalledocComponent } from './components/detalledoc/detalledoc.component';

@NgModule({
  declarations: [
        AppComponent,
        LoginComponent,
        DocumentosCRUDComponent,
        DetalledocComponent,
      
 
    
    
  ],
  imports: [
        CommonModule,
        BrowserModule,
        BrowserAnimationsModule,
        ToastrModule.forRoot(), // required animations module
        HttpClientModule,
        routing,
        FormsModule

  ],
  providers: [appRoutingProviders,],
  bootstrap: [AppComponent]
})

export class AppModule { }
