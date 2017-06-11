<?php

echo '
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Dashboard</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/kn-fsm/index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Calendar<a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Login</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">Overview <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Reports</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="ice_time.php">Ice Time</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Maintenance</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Equipment</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Notes</a>
            </li>
          </ul>

          <ul class="nav nav-pills flex-column">
             <li class="nav-item">
              <a class="nav-link" href="#">Skills Overview</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Routines</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Competitions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Workshops</a>
            </li>
          </ul>
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/kami-nashi/kn-fsm/">Git Repo for KN-FSM</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://docs.google.com/spreadsheets/d/10NnDnV2HpXcRsGWtajCnOiUfoitcLQloFosvLXYcEMU">Original Google Doc</a>
            </li>
          </ul>

        </nav>

        <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
          <h1>Dashboard</h1>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">';
?>