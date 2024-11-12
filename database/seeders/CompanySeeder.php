<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::truncate();
        Post::truncate();
        $companies = [
            [
                'user_id' => 2,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221686/o4n2nrq50bzd9fn25l6q.png',
                'title' => 'Microsoft',
                'description' => 'This company Pvt Ltd is the company specialized to help organizations with financial technology solutions...',
                'website' => 'https://www.microsoft.com/vi-vn/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221687/jgr4bjqe6hvzwrlyo2ix.webp',
            ],
            [
                'user_id' => 4,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221995/ar44lwoshfwdoqtom0uh.jpg',
                'title' => 'LG Chem',
                'description' => 'LG Electronics Inc. là một công ty điện tử đa quốc gia của Hàn Quốc...',
                'website' => 'https://www.lgchem.com/main/index',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731333928/nsy7ohgq10aalxepjblq.jpg',
            ],
            [
                'user_id' => 7,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731078014/cdvujn8u7ij5dhpcnseh.jpg',
                'title' => 'VINFAST',
                'description' => 'VinFast - a member of Vingroup – envisioned to drive the movement of the global smart electric vehicle revolution...',
                'website' => 'https://vinfastauto.com/vn_vi',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731222434/mqsjys2qrmqgc16mj6c3.jpg',
            ],
            [
                'user_id' => 8,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731150617/dbt0kestyjodfhcrcmrp.jpg',
                'name' => 'Google',
                'description' => 'Chào mừng bạn đến với Google - một trong những công ty công nghệ hàng đầu thế giới...',
                'website' => 'https://www.google.com.vn/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731150618/rqz5wedavt4tp6zdyqaw.jpg',
            ],
            [
                'user_id' => 9,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731220266/ulxgbiesmdtegixn8zbx.jpg',
                'title' => 'Apple',
                'description' => 'Apple Inc. là một Tập đoàn công nghệ đa quốc gia của Mỹ có trụ sở chính tại Cupertino...',
                'website' => 'https://www.apple.com/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731220267/zzj3fsljlsoinirrc53p.png',
            ],
            [
                'user_id' => 10,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731222301/rlbgnmdpoikejdvm3hux.png',
                'title' => 'Kiaisoft',
                'description' => 'Được thành lập từ 2019, Kiaisoft là công ty startup công nghệ với khách hàng mục tiêu là thị trường Nhật Bản...',
                'website' => 'https://kiaisoft.com/en',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731222304/mkid6hfqxl5y63nzawvr.png',
            ],
        ];

        // Tạo các công ty
        foreach ($companies as $company) {
            $companyRecord = Company::create([
                'user_id' => $company['user_id'],
                'company_category_id' => $company['company_category_id'],
                'logo' => $company['logo'],
                'title' => $company['title'],
                'description' => $company['description'],
                'website' => $company['website'],
                'cover_img' => $company['cover_img'],
            ]);

            // Tạo các công việc cho mỗi công ty
            $this->createPostsForCompany($companyRecord);
        };

        DB::table('post_user')->insert([
            [
                'post_id' => 4,
                'user_id' => 11
            ]
        ]);
    }

    /**
     * Create posts for a given company
     *
     * @param Company $company
     * @return void
     */
    public function createPostsForCompany(Company $company)
    {
        $jobTitles = [
            'PHP Laravel Developer',
            'Marketing Expert',
            'Professional Designer',
            'Data Analyst',
            'Project Manager',
            'Frontend Developer',
            'Backend Developer',
            'UI/UX Designer',
            'Software Engineer',
            'Graphic Designer',
            'Business Analyst',
            'Mobile Developer',
            'DevOps Engineer',
            'QA Engineer',
            'DevSecOps Engineer',
            'Cybersecurity Analyst',
            'Full Stack Developer',
            'Cloud Engineer',
        ];



        $levels = ['Junior level', 'Mid level', 'Senior level', 'Top level', 'Entry level'];
        $employments = ['Full Time', 'Part Time', 'Tnternship', 'Trainneship', 'Volunter', 'Freelance'];
        $educations = ['Bachelors', 'Masters', 'SEE Mid School', 'High School', 'Other'];
        $locations = ['Da Nang, Hai Phong', 'Hanoi, Vietnam', 'Ho Chi Minh City, Vietnam', 'New York, USA'];
        $salaries = ['20k - 50k', '50k - 100k', '100k - 150k'];
        $vacancyCount = rand(1, 20);
        $deadline = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +2 days"));
        $skills = 'Team player, Active listener, Communication skills, Leadership, Teamwork, Problem-solving, Adaptability, Time management';
        $experiences = ['1 year', '2 years', '3 years', 'More than 5+ year'];


        $decription = '<h3>Mô tả công việc:</h3><p>Chúng tôi đang tìm kiếm một Senior Node.js
                        Developer tài năng và giàu kinh nghiệm để gia nhập đội ngũ của mình.
                        Bạn sẽ chịu trách nhiệm xây dựng và phát triển các ứng dụng backend
                        mạnh mẽ, hiệu suất cao, tập trung vào việc cung cấp trải nghiệm người dùng tối ưu.
                        Vị trí này đòi hỏi kỹ năng kỹ thuật vững vàng và khả năng làm việc độc lập cũng như theo nhóm.
                        </p><h3>Nhiệm vụ chính:</h3><ul><li>Thiết kế, phát triển và triển khai các ứng dụng backend sử dụng Node.js.
                        </li><li>Tối ưu hóa hiệu suất ứng dụng và cải thiện tính bảo mật của hệ thống.</li><li>
                        Tạo và duy trì RESTful APIs cũng như GraphQL APIs để kết nối giữa các thành phần của ứng dụng.</li>
                        <li>Làm việc cùng các bộ phận khác như frontend, product, và thiết kế để hiểu và đáp ứng yêu cầu người dùng.<
                        /li><li>Quản lý database và tối ưu hóa truy vấn để đảm bảo hệ thống hoạt động ổn định
                        .</li><li>Thực hiện các bài kiểm tra tự động (unit test, integration test) và code review để
                        đảm bảo chất lượng mã nguồn.</li><li>Định hướng và hướng dẫn các thành viên khác trong nhóm về kỹ
                        thuật cũng như các best practices.</li></ul><p><br></p>';


        $postCount = rand(1, 10);

        for ($i = 0; $i < $postCount; $i++) {
            Post::create([
                'job_title' => $jobTitles[array_rand($jobTitles)],
                'job_level' => $levels[array_rand($levels)],
                'vacancy_count' => $vacancyCount,
                'deadline' => $deadline,
                'employment_type' => $employments[array_rand($employments)],
                'education_level' => $educations[array_rand($educations)],
                'salary' => $salaries[array_rand($salaries)],
                'job_location' => $locations[array_rand($locations)],
                'company_id' => $company->id,
                'skills' => $skills,
                'experience' => $experiences[array_rand($experiences)],
                'specifications' => $decription,
                'views' => rand(1, 10000),
            ]);
        }
    }
}
