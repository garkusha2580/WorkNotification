# -*- coding: utf-8 -*-
import scrapy
from urllib.parse import urlencode


class WorkuaSpider(scrapy.Spider):
    name = 'workua'
    allowed_domains = ['work.ua']
    start_urls = ['https://www.work.ua/']
    city = None
    keyword = None

    def __init__(self, keyword="php", city="zaporizhzhya"):
        self.city = city
        self.keyword = keyword

    def start_requests(self):
        url = self.start_urls[0] + "-".join(list(["jobs", self.city, self.keyword]))
        yield scrapy.Request(url=url, callback=self.parse)

    def parse(self, response):
        for node in response.css("div.card-hover"):
            url = node.css("h2 a::attr(href)").extract_first()
            if url is not None:
                yield response.follow(url, self.parse_single)

    def parse_single(self, response):
        meta_data_striped = [elem.strip() for elem in response.css("dl.dl-horizontal dd::text").extract()]
        meta_data = [elem for elem in meta_data_striped if elem]
        yield {
            "keyword": self.keyword,
            "title": " ".join(response.css("h1#h1-name::text").extract()).rstrip().strip(),
            "meta": " | ".join(meta_data).rstrip().strip(),
            "body": " ".join(response.css("div.overflow *::text").extract()).rstrip().strip(),
            "city": self.city
        }
