@extends('layout.app')

@section('content')
    <section class="posts row no-gutters-lg">
        
    </section>


    <script>

        const posts = document.querySelector('.posts');
        
                axios.get('/all-post').then((res)=>{
                    console.log(res.data)
                 res.data.forEach((item)=>{
                   posts.innerHTML += `
                   <div class="col-md-6 mb-4">
                    <article class="card article-card article-card-sm h-100">
                      
                      <div class="card-body px-0 pb-0">
                        <ul class="post-meta mb-2">
                          <li> <a href="#!">travel</a>
                          </li>
                        </ul>
                        <h2><a class="post-title" href="/posts/${item.id}">${item.title}</a></h2>
                        <p class="card-text">${item.excerpt}</p>
                        <div class="content"> <a class="read-more-btn" href="/posts/${item.id}">Read Full Article</a>
                        </div>
                      </div>
                    </article>
                  </div>
                   `
                })
                })
            </script>
@endsection


