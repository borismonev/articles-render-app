<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    private $data = [
        [
            'title' => 'Programming Tips for Beginners',
            'excerpt' => 'Learn how to <strong>get started</strong> with programming.',
            'body' => '<p>Programming is a valuable skill that can open up many opportunities. Whether you want to build <strong>software</strong>, develop websites, or work on <strong>data analysis</strong>, programming is a versatile tool.</p>
     <p>For beginners, it can be a bit overwhelming, but with the right guidance, you can quickly grasp the <strong>basics</strong>. Start with a simple language like <strong>Python</strong> and work on small projects to build your skills.</p>
     <p>As you progress, you can explore more advanced topics like <strong>algorithms</strong>, <strong>data structures</strong>, and software <strong>design</strong>. The journey of programming is both challenging and rewarding.</p>'
        ],
        [
            'title' => 'The Cuteness of Guinea Pigs',
            'excerpt' => 'Discover the adorable world of <strong>guinea pigs</strong>.',
            'body' => '<p><strong>Guinea pigs</strong> are small, furry, and incredibly charming pets. Their gentle nature and cute appearance make them popular among animal lovers.</p>
     <p>These rodents are native to South America and have been domesticated for centuries. <strong>Guinea pigs</strong> make excellent companions due to their social behavior and friendly demeanor.</p>
     <p>In this post, we will explore the world of <strong>guinea pigs</strong>, from their history to care tips and fun facts about these lovable creatures.</p>'
        ],
        [
            'title' => 'Web Development Best Practices',
            'excerpt' => 'Master the art of <strong>web development</strong>.',
            'body' => '<p><strong>Web development</strong> is an ever-evolving field with a wide range of technologies and practices. To create successful websites and web applications, developers need to follow <strong>best practices</strong>.</p>
     <p>Key aspects of <strong>web development</strong> include front-end and back-end development, <strong>responsive design</strong>, <strong>performance optimization</strong>, and <strong>security</strong>. Staying updated with the latest trends and tools is crucial for success.</p>
     <p>In this blog post, we will dive into the essential <strong>best practices</strong> that every web developer should be aware of and incorporate into their work.</p>'
        ],
        [
            'title' => 'Guinea Pigs as Companions',
            'excerpt' => 'Why <strong>guinea pigs</strong> make great pets.',
            'body' => '<p><strong>Guinea pigs</strong> are not just cute; they are also gentle and social animals that can bring joy to your life. They are known for their friendly behavior and <i>affectionate</i> nature.</p>
     <p>When properly cared for, <strong>guinea pigs</strong> can form strong bonds with their owners and become cherished companions. This post will discuss the reasons why <strong>guinea pigs</strong> make great pets and how to care for them.</p>'
        ],
        [
            'title' => 'Python: A Versatile Language',
            'excerpt' => 'Explore the power of <strong>Python</strong> programming.',
            'body' => '<p><strong>Python</strong> is a versatile programming language known for its simplicity and flexibility. It has gained popularity in various fields, including <strong>web development</strong>, <strong>data science</strong>, and <strong>automation</strong>.</p>
     <p>With its clear and readable syntax, <strong>Python</strong> is an excellent choice for beginners. You can use it to create web applications, analyze <strong>data</strong>, build machine learning models, and much more.</p>
     <p>This blog post will introduce you to the world of <strong>Python</strong> and highlight some of its key features and use cases.</p>'
        ],
        [
            'title' => 'Caring for Your Guinea Pig',
            'excerpt' => 'Essential tips for <strong>guinea pig</strong> owners.',
            'body' => '<p>Proper care is crucial to ensure the health and happiness of your <strong>guinea pig</strong>. These small creatures have specific needs that must be met to keep them thriving.</p>
     <p>This post will provide essential tips on <strong>guinea pig care</strong>, covering topics such as <i>diet</i>, <i>housing</i>, <i>grooming</i>, and social interaction. By following these guidelines, you can provide your <strong>guinea pig</strong> with a loving and healthy environment.</p>'
        ],
        [
            'title' => 'Software Development Lifecycle',
            'excerpt' => 'Understanding the stages of <strong>software development</strong>.',
            'body' => '<p>The software development lifecycle encompasses <strong>planning</strong>, <strong>development</strong>, <strong>testing</strong>, and more. It is a structured process that ensures software projects are completed successfully.</p>
     <p>Understanding each stage of the <strong>software development</strong> lifecycle is crucial for developers and project managers. This blog post will break down the key phases and their importance in delivering high-quality <strong>software products</strong>.</p>'
        ],
        [
            'title' => 'Programming Guinea Pigs',
            'excerpt' => 'When <strong>Guinea Pigs</strong> Meet Coding',
            'body' => '<p>Imagine a world where <strong>guinea pigs</strong> are not only adorable pets but also coding enthusiasts. In this unique blog post, we explore the fascinating concept of "Programming <strong>Guinea Pigs</strong>."</p>
     <p>While <strong>guinea pigs</strong> may not be able to write code themselves, they can certainly keep you company during those late-night coding sessions. Their soft fur and soothing squeaks are the perfect antidote to <strong>debugging</strong> frustrations.</p>
     <p>We\'ll also discuss the benefits of having a <strong>guinea pig</strong> as your coding companion and how they can provide you with the motivation you need to tackle even the toughest coding challenges.</p>
     <p>So, join us on this whimsical journey into the world of <strong>coding</strong> and <strong>guinea pigs</strong>, where paws and keyboards meet in perfect harmony!</p>'
        ]
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $post) {
            Post::create($post);
        }
    }
}
