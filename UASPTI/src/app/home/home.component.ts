import { HttpClient } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { GlobalConstants } from '../global-constants'

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
  API_KEY = `648c494b0fb50feb8306458421ef7f02`
  url = `https://api.themoviedb.org/3/trending/movie/day?api_key=${this.API_KEY}`
  poster_url = `http://image.tmdb.org/t/p/w500`

  popular_movie = []

  constructor(private http: HttpClient) {
    this.http.get(this.url).toPromise().then(data => {
      for (let i = 0; i < data['results'].length; i++) {
        this.popular_movie.push(
          {
            "title": data['results'][i].original_title,
            "poster": this.poster_url + data['results'][i].poster_path,
            "vote": data['results'][i].vote_average,
            "date": data['results'][i].release_date,
            "overview": data['results'][i].overview,
            "id": data['results'][i].id,
          })
      }
    })
  }

  ngOnInit(): void {
  }

  addList(movie) {
    GlobalConstants.watchlist.push(movie)
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
