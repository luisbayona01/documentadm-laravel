import {ModuleWithProviders}  from '@angular/core';
import {Routes,RouterModule}  from '@angular/router';
import {LoginComponent}  from './components/login/login.component';
import { DocumentosCRUDComponent } from './components/documentos-crud/documentos-crud.component';
import { DetalledocComponent } from './components/detalledoc/detalledoc.component';

const appRoutes:Routes=[
{path:'',component:LoginComponent},
{path:'documentos',component:DocumentosCRUDComponent},
{path:'detalle/:id',component:DetalledocComponent},
]

export const appRoutingProviders:any[]=[];
export const routing: ModuleWithProviders<any> = RouterModule.forRoot(appRoutes);
