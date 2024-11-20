<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\Services\ProvinceService;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'user_id' => 2,
                'company_category_id' => 1,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221686/o4n2nrq50bzd9fn25l6q.png',
                'title' => 'Microsoft',
                'description' => 'Microsoft là một tập đoàn công nghệ đa quốc gia hàng đầu thế giới, chuyên cung cấp các giải pháp công nghệ toàn diện cho các tổ chức và cá nhân. Được thành lập vào năm 1975 bởi Bill Gates và Paul Allen, Microsoft đã không ngừng định hình và thúc đẩy sự phát triển của ngành công nghệ thông tin toàn cầu. Công ty tập trung vào việc phát triển các sản phẩm và dịch vụ như hệ điều hành Windows, bộ phần mềm Microsoft Office, và dịch vụ điện toán đám mây Azure. Ngoài ra, Microsoft còn dẫn đầu trong lĩnh vực trí tuệ nhân tạo, các nền tảng phát triển phần mềm, cũng như sản xuất thiết bị phần cứng như Surface, Xbox và HoloLens. Sứ mệnh của Microsoft là trao quyền cho mọi người và mọi tổ chức trên toàn thế giới để đạt được nhiều thành tựu hơn.',
                'website' => 'https://www.microsoft.com/vi-vn/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221687/jgr4bjqe6hvzwrlyo2ix.webp',
            ],
            [
                'user_id' => 4,
                'company_category_id' => 3,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731221995/ar44lwoshfwdoqtom0uh.jpg',
                'title' => 'LG Chem',
                'description' => 'LG Chem là công ty con của tập đoàn LG, có trụ sở tại Hàn Quốc. Được thành lập vào năm 1947, LG Chem hiện là một trong những công ty hóa chất hàng đầu thế giới, với các lĩnh vực hoạt động chính bao gồm hóa chất cơ bản, hóa chất cao cấp, và vật liệu năng lượng. Công ty đóng vai trò tiên phong trong sản xuất pin Lithium-ion, cung cấp giải pháp năng lượng sạch cho các phương tiện điện như xe ô tô và các thiết bị công nghiệp khác. Không chỉ dừng lại ở lĩnh vực năng lượng, LG Chem còn sản xuất các loại nhựa tiên tiến, vật liệu công nghệ sinh học, và giải pháp công nghệ môi trường, hướng tới mục tiêu phát triển bền vững và thân thiện với môi trường. Công ty cam kết tạo ra giá trị vượt trội cho khách hàng thông qua các sản phẩm chất lượng cao và đổi mới liên tục.',
                'website' => 'https://www.lgchem.com/main/index',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731333928/nsy7ohgq10aalxepjblq.jpg',
            ],
            [
                'user_id' => 7,
                'company_category_id' => 4,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731078014/cdvujn8u7ij5dhpcnseh.jpg',
                'title' => 'VINFAST',
                'description' => 'VinFast, thuộc tập đoàn Vingroup, là nhà sản xuất phương tiện chạy điện thông minh hàng đầu Việt Nam. Được thành lập vào năm 2017, VinFast đặt mục tiêu trở thành thương hiệu xe điện toàn cầu, với tầm nhìn thúc đẩy cuộc cách mạng giao thông xanh và bền vững. Sản phẩm của VinFast bao gồm xe máy điện, ô tô điện, và xe buýt điện, được phát triển dựa trên các tiêu chuẩn chất lượng cao của châu Âu và Mỹ. Không chỉ tập trung vào sản phẩm, VinFast còn xây dựng mạng lưới trạm sạc điện rộng khắp, hỗ trợ khách hàng chuyển đổi sang sử dụng năng lượng sạch một cách dễ dàng và tiện lợi. Với đội ngũ chuyên gia kỹ thuật hàng đầu và quan hệ đối tác chiến lược với các công ty công nghệ lớn, VinFast đang từng bước khẳng định vị thế trên thị trường quốc tế.',
                'website' => 'https://vinfastauto.com/vn_vi',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731222434/mqsjys2qrmqgc16mj6c3.jpg',
            ],
            [
                'user_id' => 8,
                'company_category_id' => 6,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731150617/dbt0kestyjodfhcrcmrp.jpg',
                'title' => 'Google',
                'description' => 'Google, một trong những công ty công nghệ tiên phong trên thế giới, được thành lập vào năm 1998 bởi Larry Page và Sergey Brin. Ban đầu, Google chỉ là một công cụ tìm kiếm, nhưng hiện tại, công ty đã mở rộng thành một hệ sinh thái công nghệ khổng lồ với hàng loạt sản phẩm và dịch vụ đột phá. Google nổi tiếng với các sản phẩm như Google Search, Gmail, Google Maps, YouTube, và hệ điều hành Android, phục vụ hàng tỷ người dùng trên toàn cầu. Ngoài ra, Google còn đóng vai trò dẫn đầu trong lĩnh vực trí tuệ nhân tạo, máy học, và các dịch vụ điện toán đám mây với Google Cloud. Sứ mệnh của Google là "tổ chức thông tin của thế giới, để nó trở nên dễ dàng truy cập và hữu ích hơn cho tất cả mọi người." Với cam kết không ngừng đổi mới, Google đang tiếp tục thúc đẩy sự tiến bộ công nghệ và đem lại giá trị bền vững cho cộng đồng.',
                'website' => 'https://www.google.com.vn/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731150618/rqz5wedavt4tp6zdyqaw.jpg',
            ],
            [
                'user_id' => 9,
                'company_category_id' => 2,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731220266/ulxgbiesmdtegixn8zbx.jpg',
                'title' => 'Apple',
                'description' => 'Apple Inc. là một trong những tập đoàn công nghệ sáng tạo nhất trên thế giới, có trụ sở chính tại Cupertino, California, Hoa Kỳ. Được thành lập vào năm 1976 bởi Steve Jobs, Steve Wozniak, và Ronald Wayne, Apple đã làm thay đổi cách con người sử dụng công nghệ với các sản phẩm biểu tượng như iPhone, iPad, MacBook, Apple Watch và AirPods. Triết lý thiết kế tối giản, tinh tế và tập trung vào trải nghiệm người dùng là yếu tố giúp Apple luôn dẫn đầu ngành công nghiệp công nghệ. Bên cạnh các sản phẩm phần cứng, Apple cũng cung cấp dịch vụ phần mềm như iOS, macOS, và các dịch vụ trực tuyến như Apple Music, iCloud, và App Store. Với cam kết bảo vệ quyền riêng tư và môi trường, Apple đang hướng tới việc sử dụng 100% năng lượng tái tạo trong toàn bộ chuỗi cung ứng.',
                'website' => 'https://www.apple.com/',
                'cover_img' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731220267/zzj3fsljlsoinirrc53p.png',
            ],
            [
                'user_id' => 10,
                'company_category_id' => 4,
                'logo' => 'https://res.cloudinary.com/dfac3tvue/image/upload/v1731222301/rlbgnmdpoikejdvm3hux.png',
                'title' => 'Kiaisoft',
                'description' => 'Kiaisoft là một công ty khởi nghiệp công nghệ trẻ trung và năng động, được thành lập vào năm 2019 với trụ sở tại Việt Nam. Công ty tập trung phát triển các sản phẩm phần mềm và dịch vụ công nghệ dành cho thị trường Nhật Bản, một trong những thị trường đòi hỏi chất lượng và sự chính xác cao. Kiaisoft chuyên cung cấp các giải pháp phần mềm tùy chỉnh, bao gồm phát triển ứng dụng di động, web, và tự động hóa quy trình kinh doanh (RPA). Với đội ngũ nhân sự sáng tạo và kinh nghiệm, Kiaisoft không chỉ đáp ứng yêu cầu của khách hàng mà còn đề xuất các giải pháp đột phá giúp tối ưu hóa hiệu suất hoạt động. Trong những năm tới, Kiaisoft hướng đến việc mở rộng sang các thị trường quốc tế khác và trở thành biểu tượng của sự đổi mới trong ngành công nghệ Việt Nam.',
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

        $locations = ProvinceService::getProvinces();
        if ($locations && isset($locations['results'])) {
            $locations = array_column($locations['results'], 'province_name');
        } else {
            $locations = ['Unknown'];
        }

        $levels = ['Junior level', 'Mid level', 'Senior level', 'Top level', 'Entry level'];
        $employments = ['Full Time', 'Part Time', 'Tnternship', 'Trainneship', 'Volunter', 'Freelance'];
        $educations = ['Bachelors', 'Masters', 'SEE Mid School', 'High School', 'Other'];

        $salaries = ['20k - 50k', '50k - 100k', '100k - 150k'];
        $vacancyCount = rand(1, 20);
        $deadline = date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . " +2 days"));
        $skills = 'Team player, Active listener, Communication skills, Leadership, Teamwork, Problem-solving, Adaptability, Time management';
        $experiences = ['1 year', '2 years', '3 years', 'More than 5+ year'];


        $decription =   '<h3 class="font-weight-bold text-dark">Mô tả công việc:</h3>
                        <p class="text-secondary">
                            Chúng tôi đang tìm kiếm một Senior Node.js Developer tài năng và giàu kinh nghiệm để gia nhập đội ngũ của mình.
                            Bạn sẽ chịu trách nhiệm xây dựng và phát triển các ứng dụng backend mạnh mẽ, hiệu suất cao, tập trung vào việc cung cấp trải nghiệm người dùng tối ưu.
                            Vị trí này đòi hỏi kỹ năng kỹ thuật vững vàng và khả năng làm việc độc lập cũng như theo nhóm.
                        </p>

                        <h3 class="font-weight-bold text-dark mt-4">Nhiệm vụ chính:</h3>
                        <ul class="list-unstyled pl-3 text-secondary">
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Thiết kế, phát triển và triển khai các ứng dụng backend sử dụng Node.js.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Tối ưu hóa hiệu suất ứng dụng và cải thiện tính bảo mật của hệ thống.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Tạo và duy trì RESTful APIs cũng như GraphQL APIs để kết nối giữa các thành phần của ứng dụng.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Làm việc cùng các bộ phận khác như frontend, product, và thiết kế để hiểu và đáp ứng yêu cầu người dùng.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Quản lý database và tối ưu hóa truy vấn để đảm bảo hệ thống hoạt động ổn định.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Thực hiện các bài kiểm tra tự động (unit test, integration test) và code review để đảm bảo chất lượng mã nguồn.
                            </li>
                            <li class="mb-2">
                                <i class="fas fa-check-circle text-primary mr-2"></i> Định hướng và hướng dẫn các thành viên khác trong nhóm về kỹ thuật cũng như các best practices.
                            </li>
                        </ul>';


        $postCount = rand(1, 100);

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
