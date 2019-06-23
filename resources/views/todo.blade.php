<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>todo</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
</head>
<body>

  <div class="content" id="app">
    <div class="columns">
      <div class="column todo">
        <h1>To Dos</h1>
        <div>
          <input type="text" placeholder="What's to do?">
          <a class="button is-success" @click="newTask">ADD</a>
        </div>
        <div>
          <p>@{{ count }} items remaining</p>
          <ul>
            <todo-list v-for="task in todoList" :task="task" :completed="0"></todo-list>
          </ul>
        </div>
      </div>
      <div class="column completed">
        <h1>Completed</h1>
        <ul>
            <todo-list v-for="task in todoList" :task="task" :completed="1"></todo-list>
          </ul>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="/js/app.js"></script>
</body>
</html>