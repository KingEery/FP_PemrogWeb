<?php
// database/seeders/ConsultantsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultant;

class ConsultantsSeeder extends Seeder
{
    public function run(): void
    {
        $consultants = [
            [
                'name' => 'Adithya Firmansyah Putra',
                'email' => 'adithya@zeronegroup.com',
                'phone' => '+62812345678',
                'bio' => 'Product Engineer with 5+ years of experience developing apps for finance, e-commerce, and hotel & travel sectors. Skilled in Flutter, Dart, and Kotlin. I excel in teamwork, problem-solving, leadership, and communication. As a freshman at Bina Nusantara University, I am passionate about using technology to make a positive impact on society.',
                'position' => 'Product Engineer',
                'company' => 'Zero One Group',
                'specialty' => 'Product Management',
                'location' => 'Jakarta Timur',
                'rating' => 4.8,
                'total_reviews' => 156,
                'hourly_rate' => 150000.00,
                'profile_image' => 'image/user3.avif',
                'instagram_url' => 'https://instagram.com/adithya',
                'linkedin_url' => 'https://linkedin.com/in/adithya',
                'experiences' => [
                    [
                        'position' => 'iOS Developer',
                        'company' => 'Apple Developer Academy',
                        'location' => 'Infinite Learning',
                        'start_date' => 'Feb 2025',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'Chief Technology Officer',
                        'company' => 'Jago London',
                        'location' => '',
                        'start_date' => 'Jan 2025',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'Project Manager',
                        'company' => 'Sakuten',
                        'location' => '',
                        'start_date' => 'Nov 2024',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'Founder',
                        'company' => 'Logh',
                        'location' => '',
                        'start_date' => 'Okt 2024',
                        'end_date' => 'Sekarang',
                    ]
                ],
                'educations' => [
                    [
                        'institution' => 'BINUS University',
                        'degree' => 'Computer Science',
                        'start_year' => '2024',
                        'end_year' => 'Sekarang',
                    ]
                ],
                'skills' => ['Product Management', 'Flutter', 'Dart', 'Kotlin', 'Leadership'],
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah@techcorp.com',
                'phone' => '+62823456789',
                'bio' => 'Senior UI/UX Designer with 7+ years of experience in designing user-centered digital products. Specialized in mobile app design and user research.',
                'position' => 'Senior UI/UX Designer',
                'company' => 'TechCorp',
                'specialty' => 'UI/UX Design',
                'location' => 'Jakarta Selatan',
                'rating' => 4.9,
                'total_reviews' => 89,
                'hourly_rate' => 120000.00,
                'profile_image' => 'image/user2.jpg',
                'instagram_url' => 'https://instagram.com/sarah',
                'linkedin_url' => 'https://linkedin.com/in/sarah',
                'experiences' => [
                    [
                        'position' => 'Senior UI/UX Designer',
                        'company' => 'TechCorp',
                        'location' => 'Jakarta',
                        'start_date' => 'Jan 2022',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'UI/UX Designer',
                        'company' => 'StartupXYZ',
                        'location' => 'Jakarta',
                        'start_date' => 'Mar 2019',
                        'end_date' => 'Dec 2021',
                    ]
                ],
                'educations' => [
                    [
                        'institution' => 'Universitas Indonesia',
                        'degree' => 'Design Communication Visual',
                        'start_year' => '2015',
                        'end_year' => '2019',
                    ]
                ],
                'skills' => ['UI/UX Design', 'Figma', 'Adobe XD', 'User Research', 'Prototyping'],
                'is_active' => true,
            ],
            [
                'name' => 'Michael Chen',
                'email' => 'michael@devstudio.com',
                'phone' => '+62834567890',
                'bio' => 'Full Stack Developer with expertise in React, Node.js, and cloud technologies. Passionate about building scalable web applications.',
                'position' => 'Senior Full Stack Developer',
                'company' => 'DevStudio',
                'specialty' => 'Full Stack Development',
                'location' => 'Bandung',
                'rating' => 4.7,
                'total_reviews' => 234,
                'hourly_rate' => 175000.00,
                'profile_image' => 'image/user4.jpg',
                'instagram_url' => 'https://instagram.com/michael',
                'linkedin_url' => 'https://linkedin.com/in/michael',
                'experiences' => [
                    [
                        'position' => 'Senior Full Stack Developer',
                        'company' => 'DevStudio',
                        'location' => 'Bandung',
                        'start_date' => 'Jun 2021',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'Backend Developer',
                        'company' => 'TechSolutions',
                        'location' => 'Jakarta',
                        'start_date' => 'Jan 2019',
                        'end_date' => 'May 2021',
                    ]
                ],
                'educations' => [
                    [
                        'institution' => 'Institut Teknologi Bandung',
                        'degree' => 'Teknik Informatika',
                        'start_year' => '2015',
                        'end_year' => '2019',
                    ]
                ],
                'skills' => ['React', 'Node.js', 'Python', 'AWS', 'Docker'],
                'is_active' => true,
            ],
            [
                'name' => 'Lisa Wong',
                'email' => 'lisa@datainsights.com',
                'phone' => '+62845678901',
                'bio' => 'Data Scientist with 6+ years of experience in machine learning and data analytics. Expert in Python, R, and SQL.',
                'position' => 'Senior Data Scientist',
                'company' => 'Data Insights',
                'specialty' => 'Data Science',
                'location' => 'Surabaya',
                'rating' => 4.8,
                'total_reviews' => 67,
                'hourly_rate' => 200000.00,
                'profile_image' => 'image/user5.jpg',
                'instagram_url' => 'https://instagram.com/lisa',
                'linkedin_url' => 'https://linkedin.com/in/lisa',
                'experiences' => [
                    [
                        'position' => 'Senior Data Scientist',
                        'company' => 'Data Insights',
                        'location' => 'Surabaya',
                        'start_date' => 'Mar 2020',
                        'end_date' => 'Sekarang',
                    ],
                    [
                        'position' => 'Data Analyst',
                        'company' => 'Analytics Pro',
                        'location' => 'Jakarta',
                        'start_date' => 'Aug 2018',
                        'end_date' => 'Feb 2020',
                    ]
                ],
                'educations' => [
                    [
                        'institution' => 'Universitas Gadjah Mada',
                        'degree' => 'Statistika',
                        'start_year' => '2014',
                        'end_year' => '2018',
                    ]
                ],
                'skills' => ['Python', 'R', 'SQL', 'Machine Learning', 'Tableau'],
                'is_active' => true,
            ]
        ];

        foreach ($consultants as $consultant) {
            Consultant::create($consultant);
        }
    }
}