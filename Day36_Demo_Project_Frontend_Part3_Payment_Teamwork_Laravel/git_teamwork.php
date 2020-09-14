<?php
/**
 * git_teamwork.php
 * Kỹ năng teamwork cơ bản với GIT
 * + Giảng viên đóng vai trò trưởng nhóm, tạo 1 dự án chung cho cả
 * lớp bằng cách tạo 1 repository mới
 * + Giảng viên sẽ add các member vào dự án để có thể code chung
 * đc bằng cách sau: vào tab Settings của Repo -> Manage Access
 * -> Invite a collaborator
 * + Sau khi dc join vào dự án, các member cần làm:
 * - LẤy code của dự án về: git clone
 * - Tạo 1 brand mới và làm việc trên brand này:
 * git checkout -b <tên-brand-tự-đặt>
 * vd: git checkout -b <tên-của-bạn>
 * + Sau đó bắt đầu code chức năng: tạo 1 vài file demo ...
 * + LÀm lại các thao tác git add, git commit, và git push để
 * đẩy code lên dự án chung, tuy nhiên sẽ đẩy code vào chính brand
 * vừa tạo
 * vd: git push origin <tên-của-ban>
 * + Sau khi push -> xuất hiện 1 link remote, copy link đó paste
 * lên trình duyệt -> tự tạo pull request và tự merge code vào
 * dự án
 */