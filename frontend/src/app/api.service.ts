import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Event } from  './event';
import { Observable } from  'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  PHP_API_SERVER = "http://localhost/EventManager/backend/public";

  constructor(private httpClient: HttpClient) {}

  readEvents(): Observable<Event[]>{
    return this.httpClient.get<Event[]>(`${this.PHP_API_SERVER}/api/events`);
  }

  createEvent(event: Event): Observable<Event>{
    return this.httpClient.post<Event>(`${this.PHP_API_SERVER}/api/events`, event);
  }

  updateEvent(event: Event){
    return this.httpClient.put<Event>(`${this.PHP_API_SERVER}/api/events`, event);   
  }

  deleteEvent(id: number){
    return this.httpClient.put<Event>(`${this.PHP_API_SERVER}/api/events`, event);   
  }


}
