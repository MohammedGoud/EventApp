import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.css']
})
export class DashboardComponent implements OnInit {

  events:  Event[];
  selectedEvent:  Event  = { id :  null , number:null, amount:  null};

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.apiService.readEvents().subscribe((eventsParms: Event[])=>{
      this.events = eventsParms;
      console.log(this.events);
      
    })

    createOrUpdateEvent(form){
      if(this.selectedEvent && this.selectedEvent.id){
        form.value.id = this.selectedEvent.id;
        this.apiService.createEvent(form.value).subscribe((Event: Event)=>{
          console.log("Event updated" , Event);
        });
      }
      else{
  
        this.apiService.createEvent(form.value).subscribe((Event: Event)=>{
          console.log("Event created, ", Event);
        });
      }
  
    }
  
    selectEvent(Event: Event){
      this.selectedEvent = Event;
    }
  
    deleteEvent(id){
      this.apiService.deleteEvent(id).subscribe((Event: Event)=>{
        console.log("Event deleted, ", Event);
      });
    }

    
  }
}
