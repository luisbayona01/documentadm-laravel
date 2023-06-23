import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment'
import { Observable } from 'rxjs';
import { Documento } from '../interfaces/documento';
import { Tipodocumento } from '../interfaces/tipodocumento';
import { Proceso } from '../interfaces/proceso';
@Injectable({
  providedIn: 'root'
})
export class DocumentosServiceService {
  private apiUrl = environment.baseUrl + 'documentos';
  private baseurl = environment.baseUrl + 'doc';
  private salirurl= environment.baseUrl+'auth';
  constructor(private http: HttpClient) { }

  getTipoDocumentos(): Observable<Tipodocumento[]> {
    const headers = this.createAuthorizationHeader()
    return this.http.get<Tipodocumento[]>(`${this.baseurl}/tipodoc`, { headers });
  }

 getProcesos(): Observable<Proceso[]> {
    const headers = this.createAuthorizationHeader()
    return this.http.get<Proceso[]>(`${this.baseurl}/procesos`, { headers });
  }

  
  listarDocumentos(): Observable<Documento[]> {
    const headers = this.createAuthorizationHeader()
    return this.http.get<Documento[]>(`${this.apiUrl}/listar`, { headers });
  }

  obtenerDocumento(docId: number): Observable<Documento> {
 const headers = this.createAuthorizationHeader()
    return this.http.get<Documento>(`${this.apiUrl}/${docId}`,{ headers });
  }

  registrarDocumento(formData: FormData): Observable<any> {
    const headers = this.createAuthorizationHeader()
    return this.http.post<any>(`${this.apiUrl}/register`, formData, { headers });
  }
 
eliminarDocumento(docId: number): Observable<any> {
    const headers = this.createAuthorizationHeader()
    return this.http.delete<any>(`${this.apiUrl}/${docId}/delete`, { headers });
  }

updateDocumento(nuevoDocumento: Documento ,docId:number): Observable<any> {
   const headers = this.createAuthorizationHeader()
    return this.http.post<any>(`${this.apiUrl}/${docId}/update`, nuevoDocumento,{ headers });
  }

  private createAuthorizationHeader(): HttpHeaders {
    const token = localStorage.getItem('token');; 
    return new HttpHeaders()
      .set('Authorization', `Bearer ${token}`)
      //.set('Content-Type', 'application/x-www-form-urlencoded')
      .set('X-Requested-With', 'XMLHttpRequest');
  }

}
