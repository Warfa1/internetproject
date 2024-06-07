<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>document</title>
</head>
<body>

    @auth
    <p> congarats you are logged in.</p>
    <form action="/logout" method="post">
      @csrf
      <button>logout</button>
    </form>

      <div style="border: 3px  solid black ;">
      <h2>send a new messege  </h2>
       <form action="/create-post" method="POST">
        @csrf
        <input type="text" name="title" placeholder="messege title">
        <textarea name="body" placeholder="body content... " ></textarea>
        <button>send </button>
      </form>
      </div>
      <div style="border: 3px solid black">
        <h2>All messeges you sent </h2>
        @foreach ($posts as $post)
         <div style="background-color: grey; padding: 10px; margin: 10px;">
         <h3> {{$post['title']}} </h3>
          {{$post['body']}}
          <P><a href="/edit-post/{{$post->id}}">edit</a></P>
          <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>DELETE</button>
          </form>
         </div>
        @endforeach

      </div>

       @else 
       <div style="border: 3px  solid black ; ">
        <h2>register</h2>
        <form action="/register" method="post">
         @csrf
       <input name="name" type="text" placeholder="name">
       <input name="email" type="text" placeholder="email">
       <input name="password" type="password" placeholder="password">
       <button>register</button>
       </form>
     </div>
      <div style="border: 3px solid black; ">
      <h2>login</h2>
      <form action="/login" method="POST">
      @csrf
      <input name="loginname" type="text" placeholder="name">
      <input name="loginpassword" type="password" placeholder="password">
      <button>log in</button>
      </form>
      </div>
     @endauth
   
</body>
</html>