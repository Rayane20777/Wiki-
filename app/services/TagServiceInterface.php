<?php

interface TagServiceInterface {
    public function insert(Tag $tag);

    public function getAllTags();
}