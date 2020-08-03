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
                        <router-link
                            to="/product/create"
                            tag="a"
                            class="_nav_m"
                        >
                            Create
                        </router-link>
                        <router-link to="/product/view" tag="a" class="_nav_m">
                            View
                        </router-link>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</template>
