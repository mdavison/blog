<?php


class PostsTest extends TestCase {

    /**
     * @return void
     */
    public function testCanViewPostsIndexPage()
    {
        $response = $this->call('GET', '/posts');

        $this->assertEquals(200, $response->getStatusCode());
    }


}
