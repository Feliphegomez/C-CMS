<div class="page-title">
	<div class="title_left">
		<h3>Form Elements</h3>
	</div>
	<div class="title_right">
		<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go!</button>
				</span>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div>

<div class="row" id="app">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Design <small>different form elements</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<br />
			<router-view></router-view>
		
		
		
		
		<!-- //
			<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
				</div>
			  </div>
			  <div class="form-group">
				<label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Middle Name / Initial</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name">
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <div id="gender" class="btn-group" data-toggle="buttons">
					<label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					  <input type="radio" name="gender" value="male"> &nbsp; Male &nbsp;
					</label>
					<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
					  <input type="radio" name="gender" value="female"> Female
					</label>
				  </div>
				</div>
			  </div>
			  <div class="form-group">
				<label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
				</label>
				<div class="col-md-6 col-sm-6 col-xs-12">
				  <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text">
				</div>
			  </div>
			  <div class="ln_solid"></div>
			  <div class="form-group">
				<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
				  <button class="btn btn-primary" type="button">Cancel</button>
				  <button class="btn btn-primary" type="reset">Reset</button>
				  <button type="submit" class="btn btn-success">Submit</button>
				</div>
			  </div>

			</form>
		-->
	  </div>
	</div>
  </div>
</div>
<style>
.logo {
  width: 50px;
  float: left;
  margin-right: 15px;
}
.form-group {
  max-width: 500px;
}
.actions {
  padding: 10px 0;
}
.glyphicon-euro {
  font-size: 12px;
}
</style>

<template id="post-list">
	<div>
		<div class="actions">
			<router-link class="btn btn-default" v-bind:to="{path: '/add-post'}">
				<span class="glyphicon glyphicon-plus"></span>
				Nuevo
			</router-link>
		</div>
		<div class="filters row">
			<div class="form-group col-sm-3">
				<label for="search-element">Filter</label>
				<input v-model="searchKey" class="form-control" id="search-element" required/>
			</div>
		</div>
		<table class="table">
			<thead>
				<tr v-if="posts===null">
					<th colspan="4">Cargando...</th>
					<th>.</th>
				</tr>
				<tr v-else>
					<th v-for="(value, key) in filteredposts[0]">{{ key }}</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="posts===null">
					<td colspan="4">Loading...</td>
				</tr>
				<tr v-else v-for="post in filteredposts">
					<td v-for="(value, key) in post">
						<router-link v-bind:to="{name: 'post', params: {post_id: post.id}}">{{ value }}</router-link>
					</td>
					<td>
						<router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'post-edit', params: {post_id: post.id}}">Edit</router-link>
						<router-link class="btn btn-danger btn-xs" v-bind:to="{name: 'post-delete', params: {post_id: post.id}}">Delete</router-link>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<template id="add-post">
	<div>
		<h2>Add new post</h2>
		<form v-on:submit="createpost">
			<div class="form-group">
				<label for="add-content">Content</label>
				<textarea class="form-control" id="add-content" rows="10" v-model="post.content"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Create</button>
			<router-link class="btn btn-default" v-bind:to="'/'">Cancel</router-link>
		</form>
	</div>
</template>

<template id="post">
	<div>
		<div v-if="post[0]===null">
			<span>Loading...</span>
		</div>
		<div v-else v-for="(value, key) in post" class="row">
			<div class="col-xs-12">
				<b class="col-xs-4">{{ key }}: </b>
				<div class="col-xs-8">{{ value }}</div>
			</div>
		</div>
		<br/>
		<span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
		<router-link v-bind:to="'/'">Back to post list</router-link>
	</div>
</template>

<template id="post-edit">
	<div>
		<h2>Edit post</h2>
		<form v-on:submit="updatepost">
			<div class="form-group">
				<label for="edit-content">Content</label>
				<textarea class="form-control" id="edit-content" rows="3" v-model="post.content"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Save</button>
			<router-link class="btn btn-default" v-bind:to="'/'">Cancel</router-link>
		</form>
	</div>
</template>

<template id="post-delete">
  <div>
    <h2>Delete post {{ post.id }}</h2>
    <form v-on:submit="deletepost">
      <p>The action cannot be undone.</p>
      <button type="submit" class="btn btn-danger">Delete</button>
      <router-link class="btn btn-default" v-bind:to="'/'">Cancel</router-link>
    </form>
  </div>
</template>

<script>
var posts = null;
var api = axios.create({
  baseURL: '/api.php/records'
});
function findpost (postId) {
  return posts[findpostKey(postId)];
};
function findpostKey (postId) {
  for (var key = 0; key < posts.length; key++) {
    if (posts[key].id == postId) {
      return key;
    }
  }
};
var List = Vue.extend({
  template: '#post-list',
  data: function () {
    return {posts: posts, searchKey: ''};
  },
  created: function () {
    var self = this;
    api.get('/<?= $table; ?>').then(function (response) {
      posts = self.posts = response.data.records;
    }).catch(function (error) {
      console.log(error);
    });
  },
  computed: {
    filteredposts: function () {
      return this.posts.filter(function (post) {
        return this.searchKey=='' || post.content.indexOf(this.searchKey) !== -1;
      },this);
    }
  }
});
var post = Vue.extend({
  template: '#post',
  data: function () {
    return {post: findpost(this.$route.params.post_id)};
  }
});
var postEdit = Vue.extend({
  template: '#post-edit',
  data: function () {
    return {post: findpost(this.$route.params.post_id)};
  },
  methods: {
    updatepost: function () {
      var post = this.post;
      api.put('/<?= $table; ?>/'+post.id,post).then(function (response) {
        console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });
      router.push('/');
    }
  }
});
var postDelete = Vue.extend({
  template: '#post-delete',
  data: function () {
    return {post: findpost(this.$route.params.post_id)};
  },
  methods: {
    deletepost: function () {
      var post = this.post;
      api.delete('/<?= $table; ?>/'+post.id).then(function (response) {
        console.log(response.data);
      }).catch(function (error) {
        console.log(error);
      });
      router.push('/');
    }
  }
});
var Addpost = Vue.extend({
  template: '#add-post',
  data: function () {
    return {post: {content: '', user_id: 1, category_id: 1}}
  },
  methods: {
    createpost: function() {
      var post = this.post;
      api.post('/<?= $table; ?>',post).then(function (response) {
        post.id = response.data;
      }).catch(function (error) {
        console.log(error);
      });
      router.push('/');
    }
  }
});
var router = new VueRouter({routes:[
  { path: '/', component: List},
  { path: '/post/:post_id', component: post, name: 'post'},
  { path: '/add-post', component: Addpost},
  { path: '/post/:post_id/edit', component: postEdit, name: 'post-edit'},
  { path: '/post/:post_id/delete', component: postDelete, name: 'post-delete'}
]});
app = new Vue({
  router:router
}).$mount('#app')
</script>