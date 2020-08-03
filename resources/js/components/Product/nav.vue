<template>
    <div class="container-fluid __zeroAll">
        <header>
            <nav id="nav">
                <div class="_nav-lg">
                    <div class="logo">
                        <router-link :to="'/'" tag="a">
                            <img src="/image/logo.svg" alt="" />
                        </router-link>
                    </div>
                    <div class="_nav-list">
                        <div class="_nav">
                            <router-link
                                to="/product/create"
                                tag="a"
                                class="_nav"
                            >
                                Create
                            </router-link>
                        </div>
                        <div class="_nav">
                            <router-link
                                to="/product/view"
                                tag="a"
                                class="_nav"
                            >
                                View
                            </router-link>
                        </div>
                    </div>
                    <div class="toggler">
                        <div class="toggler_x">
                            <router-link
                                to="/product/create"
                                tag="a"
                                class="_btn_r _secondary"
                            >
                                Create
                            </router-link>
                            <router-link
                                to="/product/view"
                                tag="a"
                                class="_btn_r _primary"
                            >
                                View
                            </router-link>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
