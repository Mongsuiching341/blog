@extends('layout.app')

@section('content')
    <section class="p-3">
        <h1>{{$post->title}}</h1>
        <p class="mt-5">{{$post->content}}</p>

        <div>
            <h4>Submit your comment for this post</h4>
              <form class="comment-form" action="/posts/{{$post->id}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3" placeholder="Write your comments"></textarea>
                  </div>
                  <button type="submit" class="bg-success">Submit</button>
              </form>
            <h4>Comments</h4>
            <ul class="comments">
            </ul>
        </div>
    </section>


    <script>
        const comments  = document.querySelector('.comments')
        const url = window.location.href;

const parts = url.split("/"); // Split the pathname by "/"
const postId = parts[parts.length - 1]; // Get the last part of the pathname
const commentForm = document.querySelector('.comment-form'); 
//get post 
  const getComments = async()=>{
    try {
    const res = await axios.get(`/posts/${postId}/comments`);
    res.data.forEach((item)=>{
    comments.innerHTML += ` <li>${item.content}</li>`
})
    } catch (error) {
        console.log(error)
    }

  }

  const addComments = async()=>{
    try {
        const data = axios.post(`/posts/${postId}/comments`,{
            content: commentForm.content.value,
        }, {
    headers: {
        'Content-Type': 'application/json'
    }
  })
  alert('comment added')
    
} catch (error) {
        alert(error)
    }
  }

  getComments();

commentForm.addEventListener('submit',(e)=>{
    // e.preventDefault();
    addComments();

})

    </script>
@endsection