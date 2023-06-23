import { Injectable } from '@angular/core';
import { HttpClient,HttpHeaders } from '@angular/common/http';
import { environment } from '../../environments/environment'

@Injectable({
  providedIn: 'root'
})
export class AuthService {
  private baseUrl = environment.baseUrl+'auth';

  constructor(private http: HttpClient) { }

  register(formData: FormData) {
    return this.http.post(`${this.baseUrl}/register`, formData);
  }
 
login(formData: FormData) {
    return this.http.post(`${this.baseUrl}/login`, formData);
  }

 logout() {
const headers = this.createAuthorizationHeader()
    return this.http.post<any>(`${this.baseUrl}/logout`,'',{ headers });
  }
   private createAuthorizationHeader(): HttpHeaders {
    const token = localStorage.getItem('token');; 
    return new HttpHeaders()
      .set('Authorization', `Bearer ${token}`)
      //.set('Content-Type', 'application/x-www-form-urlencoded')
      .set('X-Requested-With', 'XMLHttpRequest');
  }

}