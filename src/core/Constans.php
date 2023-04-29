<?php

const DEFAULT_DIRECTORY_EXCLUDES = ['.', '..','.gitignore','index.html'];
const CORE_DOCUMENT_STORES = [
    'account',
    'users',
    'teams',
    'databases',
    'storage',
    'functions',
    'avatars',
    'health'
];

const CORE_DIRECTORIES = __DIR__ . DIRECTORY_SEPARATOR;
const CORE_SYSTEM_STORE_DATABASES = __DIR__ . DIRECTORY_SEPARATOR . 'db' . DIRECTORY_SEPARATOR . 'system';
const APP_DATABASE_STORE = __DIR__ . DIRECTORY_SEPARATOR . 'db';
