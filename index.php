<?php get_header(); ?>
<div ng-controller="postController" class="wp-module">
  <ul>
    <li ng-if="!postdata"><span class="loading-indicator"></span></li>
    <li ng-repeat="post in postdata | limitTo:quantity">
      <h2 ng-bind-html="post.title"></h2>
      Posted on <span ng-bind-html="post.date | date:'MMMM d'"></span> by <span ng-bind-html="post.author.name"></span>
      <div ng-bind-html="post.excerpt"></div>
      <!-- <div ng-bind="post.content | regex"></div> -->
      <div ng-if="postdata" class="prev-next-nav">
        <div ng-if="prevShown" class="cycler previous" ng-click="cycleBackward($index)">&larr; Previous</div>
        <div ng-if="nextShown" class="cycler next" ng-click="cycleForward($index)">Next &rarr;</div>
      </div>
    </li>
  </ul>
</div>
<?php get_footer(); ?>