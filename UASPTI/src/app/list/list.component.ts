import { Component, OnInit } from '@angular/core';
import { GlobalConstants } from '../global-constants'
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-list',
  templateUrl: './list.component.html',
  styleUrls: ['./list.component.css']
})
export class ListComponent implements OnInit {
  API_KEY = `648c494b0fb50feb8306458421ef7f02`
  url = `https://api.themoviedb.org/3/trending/movie/day?api_key=${this.API_KEY}`
  watch_list = GlobalConstants.watchlist

  seen = new Set()
  filteredArr = this.watch_list.filter(el =>{
    const duplicate = this.seen.has(el.title)
    this.seen.add(el.title)
    return !duplicate
  })

  constructor(private http: HttpClient){
    
  }

  ngOnInit(): void {
  }

  handleTrailer(id) {
    this.http.get(`https://api.themoviedb.org/3/movie/${id}/videos?api_key=648c494b0fb50feb8306458421ef7f02&language=en-US`)
      .toPromise().then(data => {
        window.location.href = `https://youtube.com/watch?v=${data['results'][0].key}`
      }).catch((e)=>{
        alert('Trailer not found!')
      })
  }
}
