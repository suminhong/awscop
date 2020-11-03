AWS 플젝 - 사원월급관리 프로그램
=================================
사용언어 : php
--------------

Database 이름 : awscop

Table : 월급관리 - id(key, a_i), 이름, 직급, 기본급, 수당, 세율, 월급

요구사항

1. 관리 항목 : 이름, 직급, 기본급, 수당, 세율, 월급

2. 세율
        
        - 기본급 200 이하는 0.01
        
        - 기본급 400 이하는 0.02
        
        - 기본급 400 초과는 0.03

3. 월급 = (기본급 + 수당) * (1 - 세율)

4. 웹에서 신규등록, 조회/수정 가능
        
        - 신규등록 : 이름, 직급, 기본급, 수당 입력받아 세율과 월급까지 DB에 insert
        
        - 조회 : 모든 사원의 이름 ~ 월급 보여줌
        
        - 검색 : 특정 직원을 이름으로 검색해 그 직원의 id ~ 월급 보여줌
        
        - 수정 : 테이블 옆의 수정을 누르면 이름, 직급, 기본급, 수당 입력받아 update
        
        - 삭제 : 테이블 옆의 삭제를 누르면 팝업창 한번 뜨고 해당 코드 삭제
