<!-- Menu -->
<div class="menu">
    <ul class="list">
        <li class="header">Navegación Principal</li>
        <li class="active">
            <a href="index.html">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">build</i>
                <span>Mantenimiento</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Personas</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url() ?>tipo_persona">Tipo de personas</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>clientes">Clientes</a>
                        </li>
                        <li>
                            <a href="<?= base_url() ?>empleados">Empleados</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <span>Habitaciones</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?= base_url()?>tipo_habitacion">Tipos de habitación</a>
                        </li>
                        <li>
                            <a href="<?= base_url()?>habitacion">Habitaciones</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php base_url() ?>ubigeo">
                        <span>Ubigeo</span>
                    </a>
                </li>
                <li>
                    <a href="<?php base_url() ?>servicios">
                        <span>Servicios</span>
                    </a>
                </li>
                <li>
                    <a href="<?php base_url() ?>ofertas">
                        <span>Ofertas</span>
                    </a>
                </li>